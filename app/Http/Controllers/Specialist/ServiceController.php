<?php

namespace App\Http\Controllers\Specialist;

use App\Category;
use App\Http\Controllers\Controller;
use App\Models\Specialists\Service;
use App\User;
use App\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $services = ServiceCategory::where('user_id', Auth::user()->id)->get();
        $category = Category::where('title',Auth::user()->serviceCategory->name)->first();
        $categories = Category::all();
        return view('frontend.settings.services',compact('services', 'category','categories'));
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
        $validations = Validator::make($request->all(),[
            'category'=>'required',
            'name'=>'required',
        ]);

        if($validations->fails())
        {
            return response()->json(['success' => false, 'message' => $validations->errors()]);
        }
        if(ServiceCategory::where('user_id',Auth::user()->id)->where('name',$request->name)->first() !=null){
            return response()->json(['success' => false, 'message' => [$request->name." has been already added"]]);
        }
        $serviceCategory = new ServiceCategory();
        $serviceCategory->user_id = Auth::user()->id;
        $serviceCategory->name = $request->name;
        !empty($request->t_15)?$serviceCategory->t_15 = $request->t_15:'';
        !empty($request->t_30)?$serviceCategory->t_30 = $request->t_30:'';
        !empty($request->t_45)?$serviceCategory->t_45 = $request->t_45:'';
        !empty($request->t_60)?$serviceCategory->t_60 = $request->t_60:'';
        $serviceCategory->save();
        return response()->json(['success' => true, 'message' => 'Service has been added Successfuly!']);
        // return redirect()->route('services.index')->with('success','Service added Successfuly!');
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
        $service = ServiceCategory::findOrFail($id);
        $categories = Category::all();
        $category = Category::where('title',$service->name)->first();
        return view('specialist/services/edit', compact('service', 'categories','category'));
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
        $serviceCategory = ServiceCategory::findOrFail($id);
        // dd($serviceCategory);
        $serviceCategory->name = $request->name;
        $serviceCategory->t_15 = $request->t_15;
        $serviceCategory->t_30 = $request->t_30;
        $serviceCategory->t_45 = $request->t_45;
        $serviceCategory->t_60 = $request->t_60;
        $serviceCategory->save();
        return back()->with('success', 'Service Updated Successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id)->delete();
    }

    public function getSubCategories(Request $request)
    {
        $subcategories = Category::where('id', $request->id)->first()->subcategories;
        return view('specialist/services/get_subcategories', compact('subcategories'))->render();
    }

    public function getQueryServices(Request $request)
    {
        $services = ServiceCategory::where('user_id',$request->id)->where('name', 'like', '%' . $request->val . '%')->get();
        // if($request->val =='')
        // {
        //     $services = ServiceCategory::where('user_id',$request->id)->where('name', 'like', '%' . $request->val . '%')->get();
        // }
        // else
        // {
        //     if($request->has('service_id'))
        //     {
        //         $services = Service::where('id', '!=', $request->service_id)->where('specialist_id',$request->id)->where('title', 'like', '%' . $request->val . '%')->get();
        //     }
        //     else{
        //         $services = Service::where('specialist_id',$request->id)->where('title', 'like', '%' . $request->val . '%')->get();
        //     }
        // }
        return view('partials.frontend.get_search_services', compact('services'))->render();
    }
}
