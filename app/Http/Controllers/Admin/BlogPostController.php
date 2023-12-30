<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use App\BlogPost;
use Validator;
use Session;

class BlogPostController extends Controller
{
    use ImageUploadTrait;
    // all posts admin panel
    public function index()
    {
        $pendingPosts = BlogPost::where('status','0')->get();
        $approvedPosts = BlogPost::where('add_by','user')->where('status','1')->get();
        $adminPosts = BlogPost::where('add_by','admin')->where('status','1')->get();
        return view('admin.posts.posts',compact('pendingPosts','approvedPosts','adminPosts'));
    }

    // create admin post
    public function create()
    {
        return view('admin.posts.add_post');
    }

    // store admin post
    public function store(Request $request)
    {
        $validations = Validator::make($request->all(),[
            'title'=>'required',
            // 'summery'=>'required|min:50|max:150',
            'description'=>'required',
            // 'image'=>'required|mimes:jpg,jpeg,png,gif,JPG,JPEG,PNG',
        ]);

        if($validations->fails())
        {
            return response()->json(['success' => false, 'message' => $validations->errors()]);
        }
    
        $blog = new BlogPost();
        $blog->user_id = Session::get('admin')->id;
        $blog->title = $request->title;
        $blog->slug = $request->title;
        // $blog->summery = $request->summery;
        $blog->description = $request->description;
        $blog->image = $request->image;
        $blog->add_by = $request->add_by;
        $blog->status = $request->status;
        if($blog->save()){
            return response()->json(['success' => true, 'message' =>'Blog post has been added successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = BlogPost::where('id',$id)->first();
        return view('admin.posts.view_post',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = BlogPost::where('id',$id)->first();
        return view('admin.posts.edit_post',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $blogPost = BlogPost::find($id);
        $validations = Validator::make($request->all(),[
            'title'=>'required',
            // 'summery'=>'required|min:50|max:150',
            'description'=>'required',
            // 'image'=>'mimes:jpg,jpeg,png,gif,JPG,JPEG,PNG',
        ]);

        if($validations->fails())
        {
            return response()->json(['success' => false, 'message' => $validations->errors()]);
        }
        // $img = $this->uploadImage('image','/uploadfiles/blogs',$request,$blogPost->image);
        $blogPost->user_id = Session::get('admin')->id;
        $blogPost->title = $request->title;
        $blogPost->slug = $request->title;
        // $blogPost->summery = $request->summery;
        $blogPost->description = $request->description;
        $blogPost->image = $request->image;
        if($blogPost->save()){
            return response()->json(['success' => true, 'message' =>'Blog post has been updated successfully']);
        }
    }

    // delete admin post 
    public function destroy($id)
    {
        if(BlogPost::where('id',$id)->delete()){
            return response()->json(['success' => true, 'message' =>'Blog post has been deleted successfully']);
        }
    }

    // approve user blog post
    public function approve($id)
    {
        $post = BlogPost::where('id',$id)->first();
        $post->status = '1';
        if($post->save()){
            return response()->json(['success' => true, 'message' =>'Blog post has been approved successfully']);
        }
    }

    // disapprove user blog post
    public function disapprove($id)
    {
        $post = BlogPost::where('id',$id)->first();
        $post->status = '0';
        if($post->save()){
            return response()->json(['success' => true, 'message' =>'Blog post has been disapproved successfully']);
        }
    }
}
