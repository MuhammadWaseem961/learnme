<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Admin;
use Validator;
use Session;
use App\Booking;
use DB;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
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
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $admin = Admin::where('id',decrypt($id))->first();
        return view('admin.admins.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $profile = Admin::find($id);
        $validations = Validator::make($request->all(), [
            'username' => ['required', 'string'],
            'stripe_public_key' => ['required', 'string', 'max:255'],
            'stripe_secret_key' => ['required', 'string', 'max:255'],
        ]);

        if($validations->fails())
        {
            return back()->withErrors($validations);
        }

        $profile->username = $request->username;
        $profile->stripe_public_key = $request->stripe_public_key;
        $profile->stripe_secret_key = $request->stripe_secret_key;
        $profile->save();
        Session::put('admin', $profile);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    // update picture of admin
    public function update_avatar(Request $request,$id)
    {
        $profile = Admin::find($id);
        $old_avatar = $profile->picture;
        $this->validate($request, [
            'avatar' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        //storing new avatar image
        if ($request->hasFile('avatar')) {

            $profileImage = $request->file('avatar');
            $profile_image_original_name = $profileImage->getClientOriginalName();
            $image_changed_name = time() . '.'.$profileImage->extension();

            $profileImage->move('public/uploadfiles/userphoto/', $image_changed_name);
            $avatar_url = url('/public/uploadfiles/userphoto') .'/'. $image_changed_name;
        }

        $profile->picture = $avatar_url;
        $profile->save();
        Session::put('admin', $profile);
        if (!empty($old_avatar)){
            if(file_exists($old_avatar)){
                unlink($old_avatar);
            }
        }
        return back();
    }

    public function password($id)
    {
        $password = Admin::find(decrypt($id));
        return view('admin.password', compact('password'));
    }

    // update password of admin
    public function update_password(Request $request,$id)
    {
        $password = Admin::find(decrypt($id));

        $this->validate($request, [
            'old_password' => ['required', 'string', 'min:8'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed', 'different:old_password'],
        ]);
        if (md5($request->old_password)==$password->password) {

            $password->password = md5($request->new_password);
            $password->save();
            return back()->with('success', 'Password updated successfully!');
        } else {
            return back()->withInput();
        }
    }

    // all bookings
    public function bookings(){
        $bookings = Booking::all();
        $fee=DB::table('tb_fee')->first();
        return view('admin.bookings.index',compact('bookings','fee'));
    }

    // get commission fee
    public function getCommissionFee(){
        $fee = DB::table('tb_fee')->first();
        return view('admin.commission_fee',compact('fee'));
    }

    // update commission fee
    public function updateCommissionFee(Request $request ,$id){
        DB::update('update tb_fee set fee = ? where id = ?',[$request->fee,$id]);
        return back();
    }
}
