<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Retweet;
use App\Models\Post;

class RetweetController extends Controller
{
public function __construct(){
        $this->post = new Post();
    }

    public function index(){

    }

    public function store(Request $request,Retweet $retweet){
        $request->validate($retweet->rules());
        $post_exists = $this->post->exists($request->post_id);
        $already_retweeted = Like::where('post_id',$request->post_id)->where('user_id', Auth::user()->id)->exists();

        if($already_retweeted){
            return response()->json([
                'status' => 'error',
                'message' => 'post already retweeted by this user'
            ]);
        }

        if(!$post_exists){
            return response()->json([
                'status' => 'error',
                'message' => 'post does not exists'
            ]);
        }

        $retweet->post_id = $request->post_id;
        $retweet->user_id = Auth::user()->id;
        $retweet->save();

        return response()->json([
            'status' => 'success',
        ]);
    }

    public function show($id){
       return Retweet::where('post_id',$id)->with('user')->get();
    }

    public function update(){
        return response()->json([
            'status' => 'error',
            'message' => 'cant update a Retweet'
        ]);
    }

    public function destroy($id, Request $request){
        $retweet_exists = Retweet::where('user_id', Auth::user()->id)->where('post_id',$id)->exists();
        if(!$retweet_exists){
            return response()->json([
                'status' => 'error',
                'message' => 'post does not exist'
            ]);
        }

        $retweet_to_destroy = Retweet::where('user_id', Auth::user()->id)->where('post_id',$id)->first();
        $retweet_to_destroy->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }
}
