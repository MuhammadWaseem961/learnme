<?php

namespace App\Http\Controllers;

use App\DisputeReply;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\DisputeAdminMail;
use App\Mail\ClientSpecialistDisputeMail;
use App\Admin;
use App\User;
use App\ClientSpecialistDispute;
use Carbon\Carbon;
class DisputeReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'reply'=>"required"
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
        (Auth::user()->type=='buyer')?$user_type='buyer':$user_type='seller';
        $dispute = new DisputeReply();
        $disp = ClientSpecialistDispute::find($request->dispute_id);
        $disp->response_time = Carbon::now(new \DateTimeZone(Auth::user()->timezone))->addDays(2);
        if(Auth::user()->type=='buyer'){
            $disp->client_response = Carbon::now(new \DateTimeZone(Auth::user()->timezone));
        }else if(Auth::user()->type=='seller'){
            $disp->specialist_response = Carbon::now(new \DateTimeZone(Auth::user()->timezone));
        }else{
            $disp->admin_response = Carbon::now(new \DateTimeZone(Auth::user()->timezone));
        }
        $disp->save();
        $admin = Admin::first();
        $dispute->dispute_id = $request->dispute_id;
        $dispute->user_type = $user_type;
        $dispute->sender_id=Auth::user()->id;
        $dispute->reciever_id=$admin->id;
        $dispute->reply = nl2br($request->reply);
        $dispute->file_type = $file_type;
        $dispute->file_link = $file_link;
        $dispute->admin_seen = 0;
        if($dispute->save())
        {
            $sender = $disp->sender;
            $reciever = $disp->reciever;
            Mail::to($sender->email)->send(new ClientSpecialistDisputeMail(['username'=>$sender->username,'file'=>$file_link,'type'=>$file_type,'subject'=>$disp->subject.' reply','comment'=>$dispute->reply,'url'=>url('/disputes').'/'.encrypt($disp->id),'page'=>'reply']));
            Mail::to($reciever->email)->send(new ClientSpecialistDisputeMail(['username'=>$reciever->username,'file'=>$file_link,'type'=>$file_type,'subject'=>$disp->subject.' reply','comment'=>$dispute->reply,'url'=>url('/disputes').'/'.encrypt($disp->id),'page'=>'reply']));
            Mail::to(config('app.mail_from'))->send(new DisputeAdminMail(['username'=>$admin->username,'email'=>$sender->email,'file'=>$file_link,'type'=>$file_type,'subject'=>$disp->subject.' reply','comment'=>$dispute->reply,'url'=>url('/disputes').'/'.encrypt($disp->id),'page'=>'reply']));
            return response()->json(['success' => true, 'message' =>"Your dispute reply has been added successfully"]);
        }
    }

    // admin dispute reply store
    public function adminStore(Request $request)
    {
        $arr = [
            'reply'=>"required"
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
        $dispute = new DisputeReply();
        $disp = ClientSpecialistDispute::find($request->dispute_id);
        $disp->response_time = Carbon::now(new \DateTimeZone(config('app.timezone')))->addDays(2);
        $disp->admin_response = Carbon::now(new \DateTimeZone(config('app.timezone')));
        $disp->save();
        $admin = Admin::first();
        $dispute->dispute_id = $request->dispute_id;
        $dispute->user_type = 'admin';
        $dispute->sender_id=$admin->id;
        $dispute->reciever_id=$admin->id;
        $dispute->reply = nl2br($request->reply);
        $dispute->file_type = $file_type;
        $dispute->file_link = $file_link;
        if($dispute->save())
        {
            $sender = $disp->sender;
            $reciever = $disp->reciever;
            Mail::to($sender->email)->send(new ClientSpecialistDisputeMail(['username'=>$sender->username,'file'=>$file_link,'type'=>$file_type,'subject'=>$disp->subject.' reply','comment'=>$dispute->reply,'url'=>url('/disputes').'/'.encrypt($disp->id),'page'=>'reply']));
            Mail::to($reciever->email)->send(new ClientSpecialistDisputeMail(['username'=>$reciever->username,'file'=>$file_link,'type'=>$file_type,'subject'=>$disp->subject.' reply','comment'=>$dispute->reply,'url'=>url('/disputes').'/'.encrypt($disp->id),'page'=>'reply']));
            Mail::to(config('app.mail_from'))->send(new DisputeAdminMail(['username'=>$admin->username,'email'=>$sender->email,'file'=>$file_link,'type'=>$file_type,'subject'=>$disp->subject.' reply','comment'=>$dispute->reply,'url'=>url('/dashboard/admin/dispute').'/'.encrypt($disp->id),'page'=>'reply']));
            return response()->json(['success' => true, 'message' =>"Your dispute reply has been added successfully"]);
        }
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\DisputeReply  $disputeReply
     * @return \Illuminate\Http\Response
     */
    public function show(DisputeReply $disputeReply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DisputeReply  $disputeReply
     * @return \Illuminate\Http\Response
     */
    public function edit(DisputeReply $disputeReply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DisputeReply  $disputeReply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DisputeReply $disputeReply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DisputeReply  $disputeReply
     * @return \Illuminate\Http\Response
     */
    public function destroy(DisputeReply $disputeReply)
    {
        //
    }

    public function replies(Request $request){
        $admin = Admin::first();
        $dispute=ClientSpecialistDispute::where('id',$request->dispute)->first();
        // $replies = $dispute->replies()->where('sender_id',$request->sender)->orWhere('reciever_id',$request->sender)->get();
        $replies = $dispute->replies;
        return response()->json(['html'=>view('partials.frontend.dispute_replies',compact('replies','admin'))->render()]);
    }
}
