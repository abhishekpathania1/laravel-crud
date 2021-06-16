<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Migration;
use App\Models\Post;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    //

    public function index()
    {
        $allRecords = Migration::all();
        if ($allRecords) {
            return response(["status" => "success", "data" => $allRecords], 200);
        } else {
            return response(["status" => "error", 'message' => 'Record not found', "data" => []], 404);
        }
    }


    public function show($id)
    {
        $allRecords = Migration::find($id);
        if ($allRecords) {
            return response(["status" => "success", "data" => $allRecords], 200);
        } else {
            return response(["status" => "error", 'message' => 'Record not found', "data" => []], 404);
        }
    }
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts,title',
            'body' => 'required|max:255'
        ]);

        $posts = new Post();
        $posts->title = $request->input('title');
        $posts->body = $request->input('body');
        $posts->save();

        if ($posts) {
            return response(["status" => "success", "data" => $posts], 200);
        } else {
            return response(["status" => "error", 'message' => 'Already Exist', "data" => []], 404);
        }
    }


    public function read()
    {
        $posts = Post::all();
        if ($posts) {
            return response(["status" => "success", "data" => $posts], 200);
        } else {
            return response(["status" => "error", 'message' => 'Record not found', "data" => []], 404);
        }
    }


    public function readbyid($id)
    {
        $posts = Post::find($id);
        if ($posts) {
            return response(["status" => "success", "data" => $posts], 200);
        } else {
            return response(["status" => "error", 'message' => 'Record not found', "data" => []], 404);
        }
    }

    public function update(Request $request ,$id)
    {

        $request->validate([
            'title'=>'required|unique:posts,title,'.$id,
            'body' => 'required|max:255'
        ]);
        $posts = Post::find($id);
        $posts->title = $request->input('title');
        $posts->body  = $request->input('body');
        $posts->save();
        if ($posts) {
            return response(["status" => "success",'message'=>'Updated successfully', "data" => $posts], 200);
        } else {
            return response(["status" => "error", 'message' => 'Already Exist', "data" => []], 404);
        }
    }

    public function delete($id)
    {
        $posts = Post::where('id',$id)->delete();
        return back()->with('post_deleted','Post has been deleted successfully!');
        if ($posts) {
            return response(["status" => "success", "data" => $posts], 200);
        } else {
            return response(["status" => "error", 'message' => 'Record not found', "data" => []], 404);
        }
    }

}
