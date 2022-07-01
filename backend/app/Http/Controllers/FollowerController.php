<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follower;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    public function index(){}

    public function store(Request $request, Follower $follower){
        $request->validate($follower->rules());
        $is_users_valid = User::where('id', Auth::user()->id)->exists() && User::where('id', $request->followed_id)->exists();
        $is_already_followed = Follower::where('follower_id', Auth::user()->id)->where('followed_id', $request->followed_id)->exists();

        if(!$is_users_valid || $request->followed_id == Auth::user()->id || $is_already_followed) {
            return response()->json([
                "error" => "Failed",
            ], 404);
        }

        $follower->follower_id = Auth::user()->id;
        $follower->followed_id = $request->followed_id;
        $follower->save();
    }

    public function show($id, Request $request){
        if ($request->option == 'followers'){
            $user_followers = User::with('followers')->where('id', $id)->get();

            if(!isset($user_followers[0])) return response()->json(['error' => 'Invalid'],404);
            foreach ($user_followers[0]->followers as $key => $value) {
                $followers_id_array[$key] = $value->follower_id;
            }

            
            return User::whereIn("id",$followers_id_array)->get();
        }else{
            $user_followers = User::with('followed')->where('id', $id)->get();

            if(!isset($user_followers[0])) return response()->json(['error' => 'Invalid'],404);
            foreach ($user_followers[0]->followed as $key => $value) {
                $followers_id_array[$key] = $value->followed_id;
            }

            return User::whereIn("id",$followers_id_array)->get();
        }
       
    }
    
    public function update(){}

    public function destroy($id){
        $is_following = Follower::where('follower_id', Auth::user()->id)->where('followed_id', $id);
        if($is_following){
            $is_following->delete();
        }
    }
}
