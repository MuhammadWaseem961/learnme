<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\PaymentInfo;
use App\AvailableTime;
use App\Category;
use App\ServiceCategory;
use App\Mail\SpecialistWelcomeMail;
use App\Mail\AdminApprovalMail;
use Carbon\Carbon;
use App\Traits\ImageUploadTrait;
use Image as Image;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    use ImageUploadTrait;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $arr = [
                'username' => ['bail','required', 'unique:tb_user'],
                'first_name' => ['bail','required', 'string'],
                'last_name' => ['bail','required', 'string'],
                'phone' => ['bail','required', 'string'],
                'email' => ['bail','required', 'string', 'email', 'max:255', 'unique:tb_user'],
                'password' => ['bail','required', 'string', 'min:6', 'confirmed'],
                'country' => ['bail','required'],
            ];

        // if ($data['user_type']=='specialist')
        // {
            
        //     $arr['avatar'] = ['bail','required'];
        //     $arr['payment_method'] = ['bail','required'];
        //     $arr['business_phone'] = ['bail','required', 'string'];
        //     $arr['languages'] = ['required'];
        //     $arr['description'] = ['bail','required', 'string'];
        // }
        // else if($data['user_type']=='client')
        // {
        //     $arr['client_phone'] =['bail','required', 'string'];
        // }

        if($data['payment_method']=='stripe' && $data['user_type'] !='buyer')
        {
            $arr['payment_first_name'] = ['bail','required', 'string'];
            $arr['payment_last_name'] = ['bail','required', 'string'];
            $arr['account_number'] = ['bail','required'];
            $arr['payment_birth_date'] = ['bail','required'];
            $arr['routing_number'] = ['bail','required'];

        }
        else if($data['payment_method']!='stripe' && $data['user_type'] !='client')
        {
            $arr['payment_email'] = ['bail','required', 'string', 'email', 'max:255'];
        }

        return Validator::make($data, $arr);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $request = request();

        // $profileImage = $request->file('avatar');
        // if($request->hasFile('avatar'))
        // {
        //     $profile_image_original_name =  $request->file('avatar')->getClientOriginalName();
        //     $image_changed_name = time().'.'.$request->file('avatar')->extension();
        //     $request->file('avatar')->move('public/uploads/user/', $image_changed_name);
        //     $avatar_url = url('/uploads/user')."/".$image_changed_name;
        // }
        // else{ $avatar_url = ''; }
        $user = new User();
        $user->type=$data['user_type'];
        $user->username=$data['username'];
        $user->first_name=$data['first_name'];
        $user->last_name=$data['last_name'];
        $user->email=$data['email'];
        $user->country=$data['country'];
        $user->phone=$data['phone'];
        $user->password=Hash::make($data['password']);
        if($request->hasFile('avatar')){
            $destinationPath = public_path('uploadfiles/userphoto');
            $image_changed_name = time().'.'.'jpg';
            $img = Image::make($request->file('avatar')->getRealPath())->resize(132, 132);
            $img->save($destinationPath.'/'.$image_changed_name);
            $user->thumbnail = url('/public/uploadfiles/userphoto'.'/'.$image_changed_name);
        }
        $user->picture= $this->uploadImage('avatar','uploadfiles/userphoto',$request,url('public/uploadfiles/userphoto').'/'.'default.jpg');
        if($data['user_type'] =='seller'){
            $user->public_profile = $request->public_profile;
            $user->rating = '0';
            $user->profile_complete = '1';
            $user->approve = '0';
            $user->description = $data['description'];
            $user->languages = implode(",",$data['languages']);
            $user->payment_type=$data['payment_method'];
            if($data['payment_method']=='stripe')
            {
                $user->ssn=$data['payment_ssn'];
            }
        }
        $user->save();
        if($data['user_type'] =='seller'){
            $payment = new PaymentInfo();
            $payment->user_id = $user->id;
            if($data['payment_method']=='stripe'){
                $payment->first_name = $data['payment_first_name'];
                $payment->last_name = $data['payment_last_name'];
                $payment->dob = $data['payment_birth_date'];
                $payment->ssn = $data['payment_ssn'];
                $payment->account_number = $data['account_number'];
                $payment->routing_number = $data['routing_number'];
            }else{
                $payment->email = $data['payment_email'];
            }
            $payment->save();

            if(count(explode(',',$data['days'])) >0)
            {
                date_default_timezone_set(config('app.timezone'));
                foreach(['mon','tue','wed','thr','fri','sat','sun'] as  $key => $value){
                    if(in_array($value,explode(',',$data['days']))){
                        $hV = strtotime($data[$value.'_from'])*1000;
                        $hV.=' ~ ';
                        $hV.=strtotime($data[$value.'_to'])*1000;
                        // $hours_arr[$value] = strtotime($data[$value.'_from'])*1000.'~'.strtotime($data[$value.'_to']*1000);
                        $hours_arr[$value] = $hV;
                    }else{
                        $hours_arr[$value] = 'Closed';
                    }
                }
                $hours_arr['user_id'] = $user->id;
                AvailableTime::create($hours_arr);
            }
            $category = Category::find($data['sub_category_id']);
            $serviceCategory= new ServiceCategory();
            $serviceCategory->user_id = $user->id;
            $serviceCategory->name = $category->title;
            $serviceCategory->t_15 = '5';
            $serviceCategory->save();
            Mail::to($data['email'])->send(new SpecialistWelcomeMail(['name'=>$data['first_name']." ".$data['last_name'],'message'=>'Profile submitted successfully. We will contact you via email (ASAP) when approved!']));
            Mail::to(config('app.mail_from'))->send(new AdminApprovalMail(['username'=>$data['username'],'email'=>$data['email'],'phone'=>$data['phone']]));
        }
        
        return $user;
    }

}
