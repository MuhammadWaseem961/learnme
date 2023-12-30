<?php

namespace App\Http\Controllers;

use App\BlogPost;
use App\Http\Controllers\Controller;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Mail;
use App\Mail\BlogPostEmailToAdmin;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Session;

class BlogPostController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = BlogPost::where('user_id',Auth::user()->id)->get();
        return view('frontend.settings.posts.posts',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.settings.posts.add_post');
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
            'title'=>'required',
            // 'summery'=>'required|min:50|max:150',
            'description'=>'required',
        ]);

        if($validations->fails())
        {
            return response()->json(['success' => false, 'message' => $validations->errors()]);
        }
    
        $blog = new BlogPost();
        $blog->user_id = Auth::user()->id;
        $blog->title = $request->title;
        $blog->slug = $request->title;
        // $blog->summery = $request->summery;
        $blog->description = $request->description;
        $blog->image = $request->image;
        $blog->save();
        Mail::to(\Config::get('app.mail_from'))->send(new BlogPostEmailToAdmin($blog));
        return response()->json(['success' => true, 'message' =>'Your blog post has been submitted for to the learnme live team for review. You will receive an email notification once approved']);
        
        // if($blog->save()){
        //     Mail::to(\Config::get('app.mail_from'))->send(new BlogPostEmailToAdmin($blog));
        //     return response()->json(['success' => true, 'message' =>'Your blog post has been submitted for to the learnme live team for review. You will receive an email notification once approved']);
        // }
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
        return view('frontend.settings.posts.view_post',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $post)
    {
        return view('frontend.settings.posts.edit_post',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
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
        $blogPost->user_id = Auth::user()->id;
        $blogPost->title = $request->title;
        $blogPost->slug = $request->title;
        // $blogPost->summery = $request->summery;
        $blogPost->description = $request->description;
        $blogPost->image = $request->image;
        if($blogPost->save()){
            return response()->json(['success' => true, 'message' =>'Blog post has been updated successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(BlogPost::where('id',$id)->delete()){
            return response()->json(['success' => true, 'message' =>'Blog post has been deleted successfully']);
        }
    }

    // show blog posts on frontend
    public function blogs(){
        $posts = BlogPost::where('status','1')->get();
        return view('frontend.blog',compact('posts'));
    }

    // get blog details
    public function blogDetail($slug){
        $post = BlogPost::where('slug',$slug)->first();
        $otherPosts = BlogPost::where('slug','!=',$slug)->where('status','1')->orderBy('id','desc')->take(3)->get();
        return view('frontend.blog_details',compact('post','otherPosts'));
    }
}
