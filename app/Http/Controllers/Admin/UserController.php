<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Admin;
use Auth;
use Session;
use Illuminate\Http\Request;
use App\Mail\ApproveMailToUser;
use App\Mail\DisapproveMailToUser;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendingSeller = User::where('type','seller')->where('approve','0')->where('profile_complete','1')->get();
        $buyer = User::where('type','buyer')->get();
        $seller = User::where('type','seller')->where('approve','1')->get();
        return view('admin.users.index',compact('pendingSeller','buyer','seller'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($request->user_id);
        $user->approve = $request->status;
        if($user->save()){
            if($user->approve=='1'){
                Mail::to($user->email)->send(new ApproveMailToUser(['name'=>$user->username]));
            }
            else if($user->approve=='0'){
                Mail::to($user->email)->send(new DisapproveMailToUser(['name'=>$user->username]));  
            }
        }
        return $user->approve;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // load view for admin login
    public function login(){
        return view('auth.admin_login');
    }

    // check credentials for admin login
    public function loginCheck(Request $request){
        $user = Admin::where('username',$request->username)->where('password',md5($request->password))->first();
        if($user!=null){
            Session::put('admin', $user);
            return redirect('/admin');
        }else{
            return back()->withErrors(['username'=>'These credentials do not match our records.'])->withInput();
        }
    }
}
