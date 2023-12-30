<?php

namespace App\Http\Controllers;

use App\Channel;
use App\GroupChannel;
use Illuminate\Http\Request;

use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use App\Chat;
use App\User;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;

class FirebaseController extends Controller
{

    public function index()
    {
        return view('frontend.chat_index');
    }

    public function singleChat($id)
    {
        // $id = decrypt($id);
        $user = User::where('id',$id)->first();
        return view('frontend.chat',compact(['id','user']));
    }

    public function chatUserSwitch($id)
    {
        if(Auth::user()->type=='buyer'){ $sender_reciever = Auth::user()->id.'_'.$id; }
        elseif(Auth::user()->type=='seller'){$sender_reciever =  $user->id.'_'.Auth::user()->id; }
        // $id = decrypt($id);
        // if(Chat::where('sender_id',Auth::user()->id)->where('reciever_id',$id)->first() !=null)
        // {
        //     $sender_reciever = Chat::where('sender_id',Auth::user()->id)->where('reciever_id',$id)->first()->sender_reciever;
        // }
        // else if(Chat::where('sender_id',$id)->where('reciever_id',Auth::user()->id)->first() !=null)
        // {
        //     $sender_reciever = Chat::where('sender_id',$id)->where('reciever_id',Auth::user()->id)->first()->sender_reciever;
        // }
        // else{
        //     $sender_reciever = Auth::user()->id.$id;
        // }
        $user = User::where('id',$id)->first();
        return  response()->json(['html'=>view('partials.frontend.chat_load',compact(['id','user']))->render(),'username'=>$user->username,'sender'=>Auth::user()->id,'reciever'=>$id,'sender_reciever'=>$sender_reciever]);
    }

    public function storeBKP(Request $request) {
        
		$this->validate($request, [
			'name' => 'required'
		]);
		
		$input = $request->all();
		$sender = $input['sender'];
		$reciever = $input['reciever'];
		if(Chat::where('sender_id',$sender)->where('reciever_id',$reciever)->first() !=null)
		{
			$input['sender_reciever'] = Chat::where('sender_id',$sender)->where('reciever_id',$reciever)->first()->sender_reciever;
		}else if(Chat::where('sender_id',$reciever)->where('reciever_id',$sender)->first() !=null){
			$input['sender_reciever'] = Chat::where('sender_id',$reciever)->where('reciever_id',$sender)->first()->sender_reciever;
        }else{
			$input['sender_reciever'] = $sender.$reciever;
		}
        $cnt = "";
		$input['ip'] = request()->ip();
		$input['type'] = 'chat';
		$input['sender_id'] = $sender;
		$input['reciever_id'] = $reciever;
		$input['sender_reciever'] = $input['sender_reciever'];
		$chat = Chat::create($input);
        if($request->hasFile('img'))
        {
            $ext =  $request->img->extension();
            $fileName= $request->img->getClientOriginalName();
            if($ext=='pdf'){
                $file='pdf';
                $cnt=$fileName;
            }
            else if($ext=="docx" || $ext=='doc'){
                $file="doc";
                $cnt=$fileName;
            }
            else{
                $file="img";
                $cnt=$chat->content;
            }
            $imgName = time().'.'.$ext;
            $request->img->move(public_path('uploadfiles/firebase'), $imgName);
            $imgName = url('/uploadfiles/firebase')."/".$imgName;
        }
        else
        {
            $file ='';
            $imgName = '';
            $fileName="";
            $cnt=$chat->content;
        }
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
        $sender_user = User::where('id',$sender)->first();
        Auth::user()->picture!=''? $pro=Auth::user()->picture: $pro=url('/public/uploadfiles/userphoto/default.jpg');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri(config('services.firebase.database_url'))
        ->create();
        $database   =   $firebase->getDatabase();
        $createPost    =   $database
        ->getReference('chats')
        ->push([
            'id'=>$chat->id,
            'avatar'=>$pro,
            'type' =>  $chat->type,
            'content'  =>  $cnt,
            'name'=>$chat->name,
            'sender_id'=>$chat->sender_id,
            'reciever_id'=>$chat->reciever_id,
            'ip'=>$chat->ip,
            'sender_reciever'=>$chat->sender_reciever,
            'file_type'=>$file,
            'file_name'=>$fileName,
            'file_link'=>$imgName,
            'status'=>$chat->sender_reciever."unread",
            'reciever_status'=>$reciever."unread",
            'created_at'=>$chat->created_at,
        ]);
        $reciever = User::where('id',$chat->reciever_id)->first();
        $this->fcm_notification($reciever->name,$chat->content,$reciever->fcm_token);
		return response()->json(['data' =>$createPost->getvalue()], 200);
	}

    public function store(Request $request) {
        
        if($request->hasFile('img'))
        {
            $ext =  $request->img->extension();
            $fileName= $request->img->getClientOriginalName();
            $imgName = time().'.'.$ext;
            $request->img->move(public_path('uploadfiles/firebase'), $imgName);
            $imgName = url('/public/uploadfiles/firebase')."/".$imgName;
            return response()->json(['file_type' =>$ext,'file_name'=>$fileName,'file'=>$imgName], 200);
        }
    
	}

    public function save_token(Request $request){
        $user = User::findOrFail($request->user_id);
        $user->token = $request->fcm_token;
        $user->save();
        return response()->json([
            'success'=>true,
            'message'=>'User token updated successfully.'
        ]);
    }

    public function fcm_notification($name,$message,$token){
        $msg = array
              (
                'body'  => $message,
                'title' => $name,
                'receiver' => $name,
                'icon'  => "https://image.flaticon.com/icons/png/512/270/270014.png",/*Default Icon*/
                'sound' => 'mySound'/*Default sound*/
              );

        $fields = array
            (
                'to'        => $token,
                'notification'  => $msg,
                'priority'      =>'high'
            );

        $headers = array
            (
                'Authorization: key=' . config('services.firebase.server_key'),
                'Content-Type: application/json'
            );
        //#Send Reponse To FireBase Server 
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
        return $result;
    }
    
    public function chatUserUpdate($id)
    {
        $t = time();
        $user = User::find($id);
        $user->last_login = $t + 20;
        if($user->save())
        {
            return response()->json(["old"=>$t,"next"=>$user->last_login]);
        }
        
    }

    public function chatUserStatus($id)
    {
        $user = User::find($id);
        if($user!=null)
            return response()->json(["current"=>time(),"next"=>$user->last_login]);
        else
            return response()->json(["current"=>time(),"next"=>0]);

        
    }
    
    public function chatUpdatedUsers($id)
    {
        $users = User::all();
        $arr =[];
        foreach($users as $user)
        {
            $a = [];
            $a['id']=$user->id;
            $a['current']=time();
            $a['next']=$user->last_login;
            $a['status'] = Carbon::parse(intval($user->last_login))->diffForHumans();
            $arr[] = $a;
        }
        return response()->json($arr);
    }

    public function getEventStreamId(Request $request){
        $gChannel = GroupChannel::where('event_id',$request->id)->first();
        return response()->json(['u_id'=>$gChannel->u_id]);
    }

    public function updateEventStreamId(Request $request){
        $gChannel = GroupChannel::where('event_id',$request->id)->first();
        $gChannel->u_id = $request->u_id;
        $gChannel->save();
    }

    public function callChecker(Request $request)
    {
        if (Auth::user()->type == 'seller')
            $channel = Auth::user()->username . "_" . $request->name;
        elseif (Auth::user()->type == 'buyer')
            $channel = $request->name . "_" . Auth::user()->username;

        if(Channel::where('caller', Auth::user()->username)->orWhere('call_to',Auth::user()->username)->exists()){
            $channel = Channel::where('caller', Auth::user()->username)->orWhere('call_to',Auth::user()->username)->first();
            if($channel->status == 2){
                $currentTime = Carbon::now();
                if(strtotime($channel->created_at)+30 >=time())
                {
                    return response()->json(['status'=>'pending','caller'=>$channel->caller,'call_to'=>$channel->call_to,'sender'=>$channel->sender,'reciever'=>$channel->reciever,'booking_id'=>$channel->booking_id,'check'=>'true']);
                }else{
                    return response()->json(['status'=>'fail','caller'=>$channel->caller,'call_to'=>$channel->call_to,'sender'=>$channel->sender,'reciever'=>$channel->reciever,'booking_id'=>$channel->booking_id,'check'=>'false']);

                }
            }elseif($channel->status == 3){
                return response()->json(['status'=>'success','caller'=>$channel->caller,'call_to'=>$channel->call_to,'sender'=>$channel->sender,'reciever'=>$channel->reciever,'booking_id'=>$channel->booking_id]);
            }
        }
    }

    public function callEventChecker(Request $request)
    {
        if(GroupChannel::where('username', Auth::user()->username)->where('call_status','pending')->exists()){
            $channel = GroupChannel::where('username', Auth::user()->username)->where('call_status','pending')->first();
            if(strtotime($channel->created_at)+30 >=time())
            {
                return response()->json(['status'=>'pending','eventID'=>$channel->event_id,'call_to'=>$channel->username,'check'=>'true']);
            } 
        }    
    }

    public function endEventCall(Request $request){
        if(GroupChannel::where('event_id', $request->id)->exists()){
            $channel = GroupChannel::where('event_id', $request->id)->first();
            $channel->event->status = 'complete';
            $channel->event->save();
            $channel = GroupChannel::where('event_id', $request->id)->delete();
            return 'call ended';
        } 
    }

    public function callEnd(Request $request)
    {
        // if (Auth::user()->type == 'seller')
        // $channel = Auth::user()->username . "_" . $request->name;
        // elseif (Auth::user()->type == 'buyer')
        // $channel = $request->name . "_" . Auth::user()->username;

        if (Channel::where('caller', Auth::user()->username)->orWhere('call_to',Auth::user()->username)->exists()) {
            $channel = DB::table('channels')->where('caller', Auth::user()->username)->orWhere('call_to',Auth::user()->username)->delete(); 
            return 'call ended';
        }
        // if (Channel::where('channel', $channel)->exists()) {
        //     $channel = DB::table('channels')->where('channel', $channel)->update(['status'=>'0']);
            
        //     return 'call ended';
        // }
    }

    // get call end update
    public function getCallEndUpdate(Request $request){
        if($request->type !='' && $request->name !=''){
            if($request->type=="appointment"){
                $channel = Channel::where('channel',$request->name)->first();
            }elseif($request->type=="event"){
                $channel = GroupChannel::where('channel',$request->name)->first();
            }
            return $channel!=null? response()->json(['type'=>$request->type,'status'=>true]) : response()->json(['type'=>$request->type,'status'=>false]);
        }   
    }
}
