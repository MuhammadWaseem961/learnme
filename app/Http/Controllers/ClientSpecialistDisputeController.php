<?php

namespace App\Http\Controllers;

use App\ClientSpecialistDispute;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\DisputeAdminMail;
use App\Mail\ClientSpecialistDisputeMail;
use App\User;
use App\Admin;
use Carbon\Carbon;
use App\DisputeReply;
use Session;
use App\Traits\ImageUploadTrait;

class ClientSpecialistDisputeController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disputes = ClientSpecialistDispute::all();
        return view('admin.disputes.index',compact('disputes'));
    }

    public function disputeAraise($project,$id){
        $id = decrypt($id);
        $project = decrypt($project);
        return view('frontend.client_specialist_dispute',compact('id','project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arr = [
            'subject'=>'required',
            'comment'=>"required"
        ];
        if($request->hasFile('dispute_file')){
            $arr['dispute_file'] ='mimes:jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF,mp4,avi,mov,wmv';
        }

        $validations = Validator::make($request->all(),$arr);

        if($validations->fails())
        {
            return response()->json(['success' => false, 'message' => $validations->errors()]);
        }

        if($request->hasFile('dispute_file')){
            if(in_array($request->dispute_file->extension(),['jpg','jpeg','png','gif','JPG','JPEG','PNG','GIF'])){
                $file_type = 'image';
            }else if(in_array($request->dispute_file->extension(),['mp4','avi','mov','wmv'])){
                $file_type = 'video';
            }
            $imgName = $request->project_id.'_'.time().'.'.$request->dispute_file->extension();
            $request->dispute_file->move(public_path('uploadfiles/disputes'), $imgName);
            $file_link = url('/public/uploadfiles/disputes')."/".$imgName;
        }else{
            $file_type ='';
            $file_link = '';
        }
        $dispute = new ClientSpecialistDispute();
        $dispute->project_id = $request->project_id;
        $dispute->project_type = $request->project_type;
        $dispute->sender_id=$request->sender_id;
        $dispute->reciever_id=$request->reciever_id;
        $dispute->subject = $request->subject;
        $dispute->comment = nl2br($request->comment);
        $dispute->file_type = $file_type;
        $dispute->file_link = $file_link;
        $dispute->response_time = Carbon::now(new \DateTimeZone(Auth::user()->timezone))->addDays(2);
        if(Auth::user()->type=='buyer'){
            $dispute->client_response = Carbon::now(new \DateTimeZone(Auth::user()->timezone));
            
        }else if(Auth::user()->type=='seller'){
            $dispute->specialist_response = Carbon::now(new \DateTimeZone(Auth::user()->timezone));
        }
       
        if($dispute->save())
        {
            $sender = User::find($dispute->sender_id);
            $reciever = User::find($dispute->reciever_id);
            $auto="Hello, <br />
            <br />
            There has been a dispute filed for this appointment. <br />
            <br />
            Questions and problems are usually solved in two to three days when both parties directly together. <br />
            <br />
            Please provide a statement that details the reason for you filing the dispute, and asking for a refund. You can include any document or file that shows proof to your claim.<br />
            <br />
            Please keep in mind, that both parties will see each other’s responses.<br />
             <br />
            If you are defending a claim, please also provide a statement that details why you are not liable to provide a refund. <br />
            <br />
            From the first statement given, the other party will have exactly 48 hours to provide their first statement. If no response is provided, the case will either be closed or settled in the favor of the disputer.  <br />
            <br />
            We only need one statement from both parties. <br />
            <br />
            You can also choose to cancel the dispute as well, just mention to us in this session.  <br />
            <br />
            A learnme live arbitrator will view the responses and make a decision within 24 hours.<br />
             <br />
            Thank you.";
            $admin = Admin::first();
            $dis = new DisputeReply();
            $dis->dispute_id = $dispute->id;
            $dis->user_type ='admin';
            $dis->sender_id=$admin->id;
            $dis->reciever_id=$admin->id;
            $dis->reply = $auto;
            $dis->save();
            Mail::to($sender->email)->send(new ClientSpecialistDisputeMail(['username'=>$sender->username,'file'=>$file_link,'type'=>$file_type,'subject'=>$dispute->subject,'comment'=>$dispute->comment,'url'=>url('/disputes').'/'.encrypt($dispute->id),'page'=>'create']));
            Mail::to($reciever->email)->send(new ClientSpecialistDisputeMail(['username'=>$reciever->username,'file'=>$file_link,'type'=>$file_type,'subject'=>$dispute->subject,'comment'=>$dispute->comment,'url'=>url('/disputes').'/'.encrypt($dispute->id),'page'=>'create']));
            Mail::to(config('app.mail_from'))->send(new DisputeAdminMail(['username'=>$admin->username,'email'=>$sender->email,'file'=>$file_link,'type'=>$file_type,'subject'=>$dispute->subject,'comment'=>$dispute->comment,'url'=>url('/admin/dispute').'/'.encrypt($dispute->id),'page'=>'create']));
            return response()->json(['success' => true, 'message' =>"Your dispute has been added successfully"]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClientSpecialistDispute  $clientSpecialistDispute
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dispute = ClientSpecialistDispute::where('id',decrypt($id))->first();
        return view('frontend.client_specialist_dispute_show',compact('dispute'));
    }

    // show clientspecialist dispute 
    public function adminShow($id)
    {
        $dispute = ClientSpecialistDispute::where('id',decrypt($id))->first();
        return view('admin.client_specialist_dispute_show',compact('dispute'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClientSpecialistDispute  $clientSpecialistDispute
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientSpecialistDispute $clientSpecialistDispute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClientSpecialistDispute  $clientSpecialistDispute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->user_type!="admin"){
            $clientSpecialistDispute = ClientSpecialistDispute::find($id);
            if($clientSpecialistDispute->response_time<Carbon::now(new \DateTimeZone(Auth::user()->timezone))){
               $clientSpecialistDispute->status = 1;
               $clientSpecialistDispute->save();
            }
        }
        else if(!empty(Session::get('admin')) && $request->has('admin')){
            $clientSpecialistDispute = ClientSpecialistDispute::find($id);
            $clientSpecialistDispute->status = $request->status;
            $clientSpecialistDispute->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClientSpecialistDispute  $clientSpecialistDispute
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientSpecialistDispute $clientSpecialistDispute)
    {
        //
    }

    public function userDisputeNotifications(){
        $disputes = ClientSpecialistDispute::where('reciever_id',Auth::user()->id)->where('reciever_seen','0')->get();
        $arr =[];
        foreach($disputes as $dispute)
        {
            if($dispute->project_type=='appointments')
            {
                Auth::user()->type=='buyer'?$dispute->appointment->specialist->picture!=''? $avatar=$dispute->appointment->specialist->picture: $avatar=url('/public/uploadfiles/userphoto/default.jpg'):$dispute->appointment->user->picture!=''? $avatar=$dispute->appointment->user->picture: $avatar=url('/public/uploadfiles/userphoto/default.jpg');
                Auth::user()->type=='buyer'?$username=$dispute->appointment->specialist->username :$username=$dispute->appointment->user->username;
                $a = [];
                $a['id'] = $dispute->id;
                $a['url'] = url('/disputes').'/'.encrypt($dispute->id);
                $a['subject']=$dispute->subject;
                $a['avatar']=$avatar;
                $a['username'] = $username;
                $arr[] = $a;
            }
        }
        return response()->json($arr);
        // return response()->json(['user'=])
    }

    public function adminUserDisputeNotifications(){
        $disputes = ClientSpecialistDispute::where('sender_id','!=',Session::get('admin')->id)->where('reciever_id','!=',Session::get('admin')->id)->where('admin_seen','0')->get();
        $arr =[];
        foreach($disputes as $dispute)
        {
            if($dispute->project_type=='appointments')
            {
                $dispute->sender->picture!=''? $avatar=$dispute->sender->picture: $pro=url('/public/uploadfiles/userphoto/default.jpg');
                $a = [];
                $a['id'] = $dispute->id;
                $a['url'] = url('admin/dispute').'/'.encrypt($dispute->id);
                $a['subject']=$dispute->subject;
                $a['avatar']=$avatar;
                $a['username'] = $dispute->sender->username;
                $arr[] = $a;
            }
        }
        return response()->json($arr);
        // return response()->json(['user'=])
    }

    public function updateDisputeSeenStatus(Request $request)
    {
        // Auth::user()->user_type=='admin'? $col = 'admin_seen':$col='reciever_seen';
        $dispute = ClientSpecialistDispute::find($request->dispute);
        if(Auth::user()->user_type=='admin')
        {
            $dispute->admin_seen = 1;
        }else{
            if($dispute->reciever_id==Auth::user()->id){
                $dispute->reciever_seen = 1;
            }
        }
        $dispute->save();
    }

    public function updateAdminDisputeSeenStatus(Request $request)
    {
        $dispute = ClientSpecialistDispute::find($request->dispute);
        $dispute->admin_seen = 1;
        $dispute->save();
    }

    public function userDisputeReplyNotifications(){
        $admin = Admin::first();
        if(Auth::user()->user_type!='admin'){
            $disputes = ClientSpecialistDispute::where('sender_id',Auth::user()->id)->orWhere('reciever_id',Auth::user()->id)->get();
        }
        $disputes = ClientSpecialistDispute::all();
        $arr = [];
        foreach($disputes as $dispute){
            if(Auth::user()->type=='buyer'){
                $reply = $dispute->replies()->where('sender_id','!=',Auth::user()->id)->where('client_seen','0')->latest()->first();
            }else if(Auth::user()->type=='seller'){
                $reply = $dispute->replies()->where('sender_id','!=',Auth::user()->id)->where('specialist_seen','0')->latest()->first();
            }
            if($reply !=null){
                if($reply->user_type=='admin'){
                    $username = $admin->username;
                    $admin->picture!=''? $avatar=$admin->picture: $avatar=url('/public/uploadfiles/userphoto/default.jpg');
                }else{
                    $username = $reply->user->username;
                    $reply->user->picture!=''? $avatar=$reply->user->picture: $avatar=url('/public/uploadfiles/userphoto/default.jpg');
                }
                $a = [];
                $a['id'] = $dispute->id;
                $a['url'] = url('/disputes').'/'.encrypt($dispute->id);
                $a['subject']=Str::limit(str_replace('<br />',' ',$reply->reply), 100, '...');
                $a['avatar']=$avatar;
                $a['username'] = $username;
                $arr[] = $a;
            }
            
        }
        return response()->json($arr);
    }

    public function adminDisputeReplyNotifications(){
        $admin = Admin::first();
        $disputes = ClientSpecialistDispute::all();
        $arr = [];
        foreach($disputes as $dispute){
            $reply = $dispute->replies()->where('sender_id','!=',Session::get('admin')->id)->where('admin_seen','0')->latest()->first();
            if($reply !=null){
                // $reply->user->picture!=''? $avatar=$reply->user->picture: $avatar=url('/public/uploadfiles/userphoto/default.jpg');
                if($reply->user_type=='admin'){
                    $username = $admin->username;
                    $admin->picture!=''? $avatar=$admin->picture: $avatar=url('/public/uploadfiles/userphoto/default.jpg');
                }else{
                    $username = $reply->user->username;
                    $reply->user->picture!=''? $avatar=$reply->user->picture: $avatar=url('/public/uploadfiles/userphoto/default.jpg');
                }
                $a = [];
                $a['id'] = $dispute->id;
                $a['url'] = url('/admin/dispute').'/'.encrypt($dispute->id);
                $a['subject']=Str::limit(str_replace('<br />',' ',$reply->reply), 100, '...');
                $a['avatar']=$avatar;
                $a['username'] = $username;
                $arr[] = $a;
            }
            
        }
        return response()->json($arr);
    }

    public function userDisputeReplySeenStatus(Request $request){
        $reply = DisputeReply::where('dispute_id',$request->dispute);
        if(Auth::user()->type=='buyer'){
            $reply->update(['client_seen'=>1]);
        }else if(Auth::user()->type=='seller'){
            $reply->update(['specialist_seen'=>1]);
        }
    }

    public function adminDisputeReplySeenStatus(Request $request){
        $reply = DisputeReply::where('dispute_id',$request->dispute);
        $reply->update(['admin_seen'=>1]);
    }
}
