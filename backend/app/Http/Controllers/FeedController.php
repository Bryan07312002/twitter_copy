<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follower;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class FeedController extends Controller
{
    public function feed(){
        $feed = [];
        
        $followed_array = Follower::select('followed_id')
                            ->where('follower_id', Auth::user()->id)
                            ->get();
        foreach ($followed_array as $key => $value) {
            $followed_array[$key] = $value->followed_id;
        }
        $user_posts = Post::with('user')->whereIn('user_id',$followed_array)
                        ->whereDate('created_at', '<=', Carbon::now())
                        ->whereDate('created_at', '>=', Carbon::now()->subDays(4000))
                        ->orderBy('created_at', 'DESC')
                        ->get();

        return $user_posts;
    }
}
