<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use Image;
use Validator;

class CategoryController extends Controller
{
    
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
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
        $validations = Validator::make($request->all(),['name' => 'required|string|max:255']);
        if($validations->fails()){return response()->json(['success' => false, 'message' => $validations->errors()]);}
        $category = new Category();
        $category->title = $request->name;
        if($request->parent_category !=-1){$category->is_subcategory = 1;}
        $category->image = $this->uploadImageAndMakeThumbnail(240, 290,'image','uploadfiles/categories',$request);
        $category->category_id = $request->parent_category;
        if($category->save()){return response()->json(['success' => true, 'message' =>'Category has been stored successfuly!']);}
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
        $category = Category::findOrFail($id);
        $categories = Category::all();
        return view('admin.categories.editCategory', compact('categories','category'))->render();
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
        $validations = Validator::make($request->all(),['name' => 'required|string|max:255']);
        if($validations->fails()){ return response()->json(['success' => false, 'message' => $validations->errors()]);}
        $category = Category::findOrFail($id);
        $category->title = $request->name;
        if($request->parent_category !=-1){$category->is_subcategory = 1;}
        $category->image = $this->uploadImageAndMakeThumbnail(240, 290,'image','uploadfiles/categories',$request,$category->image);
        $category->category_id = $request->parent_category;
        if($category->save()){return response()->json(['success' => true, 'message' =>'Category has been updated successfuly!']);}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Category::where('id',$id)->delete()){return response()->json(['success' => true, 'message' =>'Category has been deleted successfully']);}
    }
}
