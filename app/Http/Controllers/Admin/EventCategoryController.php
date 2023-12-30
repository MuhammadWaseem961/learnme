<?php

namespace App\Http\Controllers\Admin;

use App\EventCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use Validator;

class EventCategoryController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = EventCategory::all();
        return view('admin.eventCategories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $validations = Validator::make($request->all(),[
            'title' => 'required|string|max:255',
            'image'=>'required|mimes:jpg,jpeg,png,gif,JPG,JPEG,PNG',
        ]);

        if($validations->fails())
        {
            return response()->json(['success' => false, 'message' => $validations->errors()]);
        }
        $category = new EventCategory();
        $category->title = $request->title;
        $category->image = $this->uploadImage('image','uploadfiles/eventCategories',$request);
        $category->save();
        if($category->save()){
            return response()->json(['success' => true, 'message' =>'Event has been added successfully']);
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
        $category = EventCategory::findOrFail($id);
        $categories = EventCategory::all();
        return view('admin.eventCategories.editCategory', compact('categories','category'))->render();
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
        $validations = Validator::make($request->all(),[
            'title' => 'required|string|max:255',
            'image'=>'mimes:jpg,jpeg,png,gif,JPG,JPEG,PNG',
        ]);

        if($validations->fails())
        {
            return response()->json(['success' => false, 'message' => $validations->errors()]);
        }
        $category = EventCategory::findOrFail($id);
        $category->title = $request->title;
        $category->image = $this->uploadImage('image','uploadfiles/eventCategories',$request,$category->image);
        if($category->save()){
            return response()->json(['success' => true, 'message' =>'Event Category has been updated successfuly!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(EventCategory::where('id',$id)->delete()){
            return response()->json(['success' => true, 'message' =>'Event category has been deleted successfully']);
        }
    }
}
