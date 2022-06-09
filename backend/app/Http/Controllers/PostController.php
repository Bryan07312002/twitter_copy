<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request){
        $with = explode(',',$request->with);
        if ($with[0] != ''){
            return response()->json([
                'status' => 'success',
                'posts' => Post::with($with)->get(),
            ]);
        }

        return response()->json([
            'status' => 'success',
            'posts' => Post::all(),
        ]);
    }

    public function store(Request $request, Post $post){
        $request->validate($post->rules());
        
        if($request->post_id || $request->post_id != null){
            $post->post_id = $request->post_id;
        }

        $post->content = $request->content;
        $post->user_id = Auth::user()->id;
        $post->has_img = $request->has_img;
        $post->comment_number = 0;
        $post->like_number = 0;
        $post->retweet_number = 0;
        $post->save();

        return response()->json([
            'status' => 'success',
        ]);
    }

    public function show($id,Request $request){
        $with = explode(',',$request->with);
        if($with[0] != ''){
            return response()->json([
                'status' => 'success',
                'posts' => Post::where('id', $id)->with($with)->get(),
            ]);
        }
 
        return response()->json([
            'status' => 'success',
            'post'=> Post::where('id',$id)->with(['comments','retweets','likes'])->get(),
        ]);
    }

    public function update(){
        return response()->json([
            'status' => 'error',
            'message' => 'can not update a post'
        ]);
    }

    public function destroy($id){
        $userDestroy = Post::find($id);
        if(Auth::user()->id != $userDestroy->user_id){
            return response()->json([
                'status' => 'error',
                'message' => 'can not delete another user post'
            ]);
        }
        
        $userDestroy->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'post deleted'
        ]);
    }
}
