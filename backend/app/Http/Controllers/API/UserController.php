<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;


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

        return $this->User->all('id','name');
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
        return $this->User->with('Profile')->find($id);
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
    public function destroy(Request $request,$id) //not working yet
    {
        $tokenRequest = substr($request->header()["authorization"][0],7);
        $tokenIdObject = PersonalAccessToken::findToken($tokenRequest);
        $UserRequested = $this->User->find($tokenIdObject->tokenable_id);
        $UserPicked = $this->User->find($id);

        if($UserRequested->id == $UserPicked->id){
            try{
                $UserPicked->with("post")->delete();
            }catch(Exception $e){
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage(),
                ]);
            }
        }

        return response()->json([
            'success' => false,
            "message" => "Unauthorized",
        ],401);
    }

    public function login(Request $request)
    {
        try {
            // create a instance of User 
            $users = new User();
            // check the validation
            $validator = Validator::make($request->all(), [
                'email' => 'required| max:30| email | min:10',
                'password' => 'required | max:12 | min:5'
            ]);
            // check validation fails
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()->all(),
                ]);
            } else {
                // get user by email
                $user = $users->where('email', $request->email)->first();
                if (!$user) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Invalid Email and Password',
                    ]);
                } else {
                    // check password
                    if (!Hash::check($request->password, $user->password)) {
                        return response()->json([
                            'success' => false,
                            'message' => 'Invalid Email and Password',
                        ]);
                    } else {
                        $token = $user->createToken("token")->plainTextToken;
                        return response()->json([
                            "success" => true,
                            "user" => [
                                "name" => $user['name'],
                                "email" => $user['email'],
                            ],
                            "token" => $token,
                            "message" => "Login successfully"
                        ]);
                    }
                }
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function logout(Request $request)
    {
        $tokenRequest = substr($request->header()["authorization"][0],7);
        $UserIdObject = PersonalAccessToken::findToken($tokenRequest);

        auth()->user()->tokens()->where('tokenable_id', $UserIdObject->tokenable_id)->delete();
    }
}
