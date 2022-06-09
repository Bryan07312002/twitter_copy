<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


class LikeController extends Controller
{
    public function __construct(){
        $this->post = new Post();
    }

    public function index(){

    }

    public function store(Request $request,Like $like){
        $request->validate($like->rules());
        $post_exists = $this->post->exists($request->post_id);
        $already_liked = Like::where('post_id',$request->post_id)->where('user_id', Auth::user()->id)->exists();

        if($already_liked){
            return response()->json([
                'status' => 'error',
                'message' => 'post already liked by this user'
            ]);
        }

        if(!$post_exists){
            return response()->json([
                'status' => 'error',
                'message' => 'post does not exists'
            ]);
        }

        $like->post_id = $request->post_id;
        $like->user_id = Auth::user()->id;
        $like->save();

        return response()->json([
            'status' => 'success',
        ]);
    }

    public function show($id){
       return Like::where('post_id',$id)->with('user')->get();
    }

    public function update(){
        return response()->json([
            'status' => 'error',
            'message' => 'cant update a like'
        ]);
    }

    public function destroy($id, Request $request){
        $like_exists = Like::where('user_id', Auth::user()->id)->where('post_id',$id)->exists();
        if(!$like_exists){
            return response()->json([
                'status' => 'error',
                'message' => 'post does not exist'
            ]);
        }

        $like_to_destroy = Like::where('user_id', Auth::user()->id)->where('post_id',$id)->first();
        $like_to_destroy->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }
}
