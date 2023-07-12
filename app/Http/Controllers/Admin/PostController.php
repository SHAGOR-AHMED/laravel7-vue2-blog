<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Auth;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();
        return response()->json([
            'posts'=>$posts
        ],200);
    }

    public function getpaginationPosts()
    {
        return Post::paginate(1);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'status' => 'required'
        ]);

        $file = explode(';', $request->thumbnail);
        $file = explode('/', $file[0]);
        $file_ex =  end($file);
        $file_name = time().'.'.$file_ex;
        
        $post = new Post;
        $post->category_id = $request->category_id;
        $post->user_id = Auth()->user()->id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->thumbnail = $file_name;
        $post->status = $request->status;
        $success = $post->save();
        if($success){
            Image::make($request->thumbnail)->resize(300, 200)->save(public_path('uploads/').$file_name);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getPostByCategory($id)
    {
        $postByCat = Post::where('category_id',$id)->get();
        return response()->json(['postByCategory'=>$postByCat],200);
    }

    public function show($id)
    {
        $post = Post::find($id);
        return response()->json(['post'=>$post],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $post = Post::find($request->id);
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->status = $request->status;

        if($request->thumbnail != $post->thumbnail){
            $file = explode(';', $request->thumbnail);
            $file = explode('/', $file[0]);
            $file_ex =  end($file);
            $file_name = time().'.'.$file_ex;
            $post->thumbnail = $file_name;
            Image::make($request->thumbnail)->resize(300, 200)->save(public_path('uploads/').$file_name);
        }

        if($post->save()){
            $success = true;
        }else{
            $success = false;
        }

        return response()->json(['success'=>$success],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $post = Post::find($id);
        $file_name = $post->thumbnail;
        if($post->delete()){
            if(file_exists(public_path('uploads/'.$file_name))){
                unlink(public_path('uploads/'.$file_name));
            }
        }
        
    }
}