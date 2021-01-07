<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use App\Notifications\StudentSignedUp;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
       
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email|unique:users', 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 422);            
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        $token = JWTAuth::fromUser($user);
        $admins = User::where('is_admin', true)->get();
        Notification::send($admins, new StudentSignedUp($user));
        /* This gives the same result as above */
        // $input = $request->all();
        // $input['password'] = bcrypt($input['password']);
        // $user = User::create($input);

        return response()->json([
            'user' => $user,
            'message' => 'User successfully registered',
            'token' => $token
        ], 201);
    }
}
