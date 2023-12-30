<?php

namespace App\Http\Controllers;

use App\Models\Specialists\Service;
use App\Specialist;
use App\User;
use Illuminate\Http\Request;
use App\Category;
use App\ServiceCategory;
use App\Traits\ImageUploadTrait;

class HomeController extends Controller
{
    use ImageUploadTrait;
    // home page
    public function home(){
        $popularServices = Category::join('tb_servicecategory','tb_categories.title','=','tb_servicecategory.name')->whereNotIn('tb_categories.title',['All','all'])->select(['tb_categories.id','tb_categories.title','tb_categories.image'])->groupBy('tb_categories.title')->get();
        return view('frontend.index',compact('popularServices'));
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function category_specialists($id)
    {
        $category =  Category::where('id',$id)->first();
        // $specialists = ServiceCategory::where('name',$category->title)->paginate(8);
        $specialists = ServiceCategory::join('tb_user as u','tb_servicecategory.user_id','=','u.id')->where('tb_servicecategory.name',$category->title)->where('u.approve','1')->select('tb_servicecategory.name','u.username','u.picture')->paginate(8);
        // $popularServices = Category::join('tb_servicecategory','tb_categories.title','=','tb_servicecategory.name')->whereNotIn('tb_categories.title',['All','all'])->select(['tb_categories.id','tb_categories.title','tb_categories.image'])->groupBy('tb_categories.title')->get();
        return view('frontend.category_specialist',compact(['specialists','category']));
    }

    public function search(Request $request)
    {   
        // $singleUser = User::where('public_profile', 'like', '%' . $request->search . '%')->first();
        // if($singleUser !=null){
        //     return redirect()->route('specialist_detail',$singleUser->username)->with('search',$request->search);
        // }
        $users = User::where('type', 'seller')->where('first_name', 'like', '%' . $request->search . '%')->orWhere('username', 'like', '%' . $request->search . '%')->where('approve','1')->get();
        $services = ServiceCategory::where('name', 'like', '%' . $request->search . '%')->get();
        if($services->count() > 0){
            $serviceUsers = User::join('tb_servicecategory','tb_user.id','=','tb_servicecategory.user_id')->where('name', 'like', '%' . $request->search . '%')->where('tb_user.approve','1')->get(['tb_user.*','tb_servicecategory.name as serviceName']);
        }else{
            $serviceUsers = [];
        }
        // return $serviceUsers;
        return view('frontend.search',compact('users','services','serviceUsers'))->with('search',$request->search);
    }

    // upload file using ajax with progress bar
    public function uploadAllFiles(Request $request){
        $path = $this->uploadImage('file','/uploadfiles/files',$request);
        return response()->json(['status'=>true,'path'=>$path]);
    }
}
