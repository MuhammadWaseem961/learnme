<?php

namespace App\Http\Controllers;

use App\Category;
use App\Client;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Bid;
use App\Portfolio;
use App\Models\Specialists\Service;
use App\Specialist;
use App\User;
use App\SubCategory;
use App\PaymentInfo;
use App\AvailableTime;
use App\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Traits\ImageUploadTrait;

class ProfileController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $profile = Auth::user();
        // $subcategories = SubCategory::all();
        // $categories = Category::all();
        // $bids = Bid::all()->groupBy('service_request_id');
        // if (Auth::user()->user_type == 'specialist') {
        //     $portfolio_images = Portfolio::where('specialist_id', Auth::user()->specialist->id)->get();
        //     $services = Service::where('specialist_id', Auth::user()->specialist->id)->get();
        //     $appointments = Appointment::where('specialist_id', Auth::user()->specialist->id)->get();
        //     return view('profile', compact('profile', 'subcategories', 'services', 'categories', 'portfolio_images', 'appointments', 'bids'));
        // } else {
        //     $appointments = Appointment::where('user_id', Auth::user()->id)->get();
        //     return view('profile', compact('profile', 'subcategories', 'categories','appointments', 'bids'));
        // }
        $categories = Category::all();
        $profile = Auth::user();
        if($profile->type=='seller')
        {
            $category = Category::where('title',$profile->serviceCategory->name)->first();
            if($category->category_id !=-1)
            {
                $parentCategory =  Category::where('id',$category->category_id)->first();
                $subCategories =  Category::where('id',$parentCategory->id)->orWhere('category_id',$parentCategory->id)->get();
            }else{
                $subCategories = Category::where('title',Auth::user()->serviceCategory->name)->get();
            }    
        }else{
            $subCategories = [];
        }
        
        return view('frontend.settings.profile', compact('profile', 'subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update_avatar(Request $request)
    {
        $profile = User::find(Auth::id());
        $old_avatar = $profile->picture;
        $this->validate($request, [
            'avatar' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        //storing new avatar image
        // if ($request->hasFile('avatar')) {

        //     $profileImage = $request->file('avatar');
        //     $profile_image_original_name = $profileImage->getClientOriginalName();
        //     $image_changed_name = time() . '.'.$profileImage->extension();

        //     $profileImage->move('public/uploads/user/', $image_changed_name);
        //     $avatar_url = url('/uploads/user') .'/'. $image_changed_name;
        // }

        $profile->picture = $this->uploadImage('avatar','uploadfiles/userphoto',$request);
        $profile->save();

        if (!empty($old_avatar)){
            if(file_exists($old_avatar)){
                unlink($old_avatar);
            }
        }

        return back()->with('success', 'Profile image updated successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function password()
    {
        $password = Auth::user();
        if (url()->current() == url('dashboard/password')){
            return view('admin.password', compact('password'));
        }else{
            return view('frontend.settings.password', compact('password'));
        }
    }
    public function UserPassword()
    {
        $password = Auth::user();
        return view('change_password', compact('password'));
    }

    public function update_password(Request $request)
    {
        $password = User::find(Auth::id());
        $validations = Validator::make($request->all(), [
            'old_password' => 'required|string|min:8',
            'new_password' => 'required|confirmed|string|min:8|different:old_password',
        ]);
        if($validations->fails()){
            return back()->withErrors($validations)->withInput();
        }
        if (Hash::check($request->old_password, $password->password)) {

            $password->password = Hash::make($request->new_password);
            $password->save();
            $request->session()->flash('success','Password update successful.');
            return back();
        } else {
            $request->session()->flash('error','Old Password does not match!');
            return back()->withErrors($validations)->withInput();
        }
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
    public function update(Request $request,$id)
    {
        $profile = User::find($id);
        $validations = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:tb_user,username,' . $profile->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:tb_user,email,' . $profile->id],
        ]);

        if($validations->fails())
        {
            return back()->withErrors($validations);
        }
       
        $profile->username = $request->username;
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->email = $request->email;
        $profile->country = $request->country;
        $profile->phone = $request->phone;
        $profile->timezone = $request->timezone;
        
        if(Auth::user()->type != 'admin'){
            
            if ($profile->type == 'seller') {
                if(count($request->days) >0)
                {
                    date_default_timezone_set($profile->timezone);
                    foreach(['mon','tue','wed','thr','fri','sat','sun'] as  $key => $value){
                        if(in_array($value,$request->days)){
                            $f = $value.'_from';
                            $t = $value.'_to';
                            $hours_arr[$value] = (strtotime($request->$f)*1000).' ~ '.(intval(strtotime($request->$t)*1000));
                        }else{
                            $hours_arr[$value] = 'Closed';
                        }
                    }
                    $hours_arr['user_id'] = $profile->id;
                    AvailableTime::where('user_id',$profile->id)->update($hours_arr);
                }
                $category = Category::find($request->sub_category_id);
                $serviceCategoryFirst= ServiceCategory::where('user_id',$profile->id)->first();
                $serviceCategory= ServiceCategory::find($serviceCategoryFirst->id);
                $serviceCategory->user_id = $profile->id;
                $serviceCategory->name = $category->title;
                $serviceCategory->save();

                $payment = PaymentInfo::where('user_id',Auth::user()->id)->first();
                $profile->payment_type = $request->payment_method;
                if ($request->payment_method == 'stripe' && $request->user_type != 'buyer') {
                    $payment->first_name = $request->payment_first_name;
                    $payment->last_name = $request->payment_last_name;
                    $payment->dob = $request->payment_birth_date;
                    $payment->ssn = $request->payment_ssn;
                    $payment->account_number = $request->account_number;
                    $payment->routing_number = $request->routing_number;
                    $profile->stripe_public_key = $request->stripe_public_key;
                    $profile->stripe_secret_key = $request->stripe_secret_key;
                } else if ($request->payment_method != 'stripe' && $request->user_type != 'buyer') {
                    $payment->email = $request->payment_email;
                }
                $payment->save();
            }
        }
        $profile->save();
        return back()->with('success', 'Profile updated successfully!');
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

    public function portfolio()
    {
        $portfolio_images = Portfolio::where('user_id',Auth::user()->id)->get();
        return view('frontend.settings.portfolio',compact('portfolio_images'));
    }
    
    public function portfolioImages(Request $request)
    {
       
        foreach ($request->images as $key => $image) {
            $portfolio = new Portfolio();
            $profile_image_original_name = $image->getClientOriginalName();
            $image_changed_name = time() . $key . '_' . str_replace('', '-', '');

            $image->move('public/uploadfiles/portfolio/', $image_changed_name);
            $portfolio->image = url('/public/uploadfiles/portfolio').'/' . $image_changed_name;
            $portfolio->specialist_id = Auth::user()->specialist->id;
            $portfolio->save();
        }
        return back()->with(['success'=> 'images upload successfuly!','portfolio'=>'active']);
    }

    public function deleteImage($id)
    {
        $portfolio_image = Portfolio::findOrFail($id);
        unlink($portfolio_image->image);
        $portfolio_image->delete();
    }

    // inserte timezone of the current login user
    public function setCurrentTimezone(Request $request){
        $url = "http://ip-api.com/json/".$request->ip();
        $ip_info = json_decode(file_get_contents($url));
        $user = User::find(Auth::user()->id);
        $user->timezone = $ip_info->timezone;
        $user->save();
    }

}
