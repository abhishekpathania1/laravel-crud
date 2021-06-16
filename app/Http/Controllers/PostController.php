<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function addPost()
    {
        return view ('add-post');
    }
    public function  createPost(request $request)
    {
        $request->validate([
            'title'=>'required|unique:posts,title',
            'body' => 'required|max:255'
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return back()->with('post_created','Post has been created Successfully!');
    }

    public function getPost()
    {
        $posts = Post::paginate(5);
        return view('posts',compact('posts'));
    }

    public function getPostById($id)
    {
        $post = Post::where('id',$id)->first();
        return view('single-post',compact('post'));
    }
    public function deletePost($id)
    {
        Post::where('id',$id)->delete();
        return back()->with('post_deleted','Post has been deleted successfully!');
    }

    public function editPost($id)
    {
        $post = Post::find($id);
        return view('edit-post',compact('post'));
    }

    public function updatePost(Request $request,$id)
    {
         $request->validate([
            'title'=>'required|unique:posts,title,'.$id,
            'body' => 'required|max:255'
        ]);
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return back()->with('post_updated','Post has been updated successfully!');
    }
}
