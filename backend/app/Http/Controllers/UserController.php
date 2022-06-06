<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UserController extends Controller
{
    public function index(User $user){
        return rand(0,count(User::all()));
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'users' => $user->all()
        ]);
    }
    public function store(){}
    public function show(){}
    public function update(){}
    public function delete(){}
}
