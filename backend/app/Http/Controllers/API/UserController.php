<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;

class UserController extends Controller
{
    public function __construct(User $user,Profile $profile)
    {
        $this->User = $user;
        $this->Profile = $profile;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->User->with('Profile')->find(1);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newUser = $this->User;
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = $request->password;
        $newUser->save();

        $newProfile = $this->Profile;
        $newProfile->user_id = $newUser->id;
        $newProfile->description = $request->description;
        $newProfile->birth_date = $request->birth_date;
        $newProfile->link = $request->link;
        $newProfile->profile_photo_path = $request->profile_photo_path;
        $newProfile->profile_banner_path = $request->profile_banner_path;
        $newProfile->save();
        return $this->User->with('Profile')->find($newProfile->user_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
