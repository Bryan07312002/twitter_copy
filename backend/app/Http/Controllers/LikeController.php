<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function index(){}
    public function store(Request $request,Like $like){
        $like->post_id = $request->post_id;
        $like->user_id = $request->user_id;
        $like->save();
        return $like;
    }
    public function show(){}
    public function update(){}
    public function delete(){}
}
