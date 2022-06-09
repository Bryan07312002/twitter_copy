<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;


class LikeController extends Controller
{
    public function index(){}
    public function store(Request $request,Like $like){//fix
        $request->validate($like->rules());
        return $like->is_unique($request->post_id, Auth::user()->id);
        if($like->is_unique($request->post_id, Auth::user()->id)){
            return response()->json([
                'status' => 'error',
                'message' => 'post already like by this user'
            ]);
        }
        $like->post_id = $request->post_id;
        $like->user_id = Auth::user()->id;
        //$like->save();

        return response()->json([
            'status' => 'success',
        ]);;
    }
    public function show(){}
    public function update(){}
    public function delete(){}
}
