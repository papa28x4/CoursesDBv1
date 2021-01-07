<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserProfileController extends Controller
{
    public function __invoke()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                    return response()->json(['user_not_found'], 404);
            }
            //This works too but will not trigger the catch block
            // if(! $user = Auth::user()){
            //     return response()->json(['user_not_found'], 404);
            // }

        } 
        catch (JWTException $e) {

            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['status' => 'Token is Invalid'], 400);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json(['status' => 'Token is Expired'], 400);
            }else{
                return response()->json(['status' => 'Authorization Token not found'], 400);
            }
        }

        $notifications = [];
        foreach($user->unreadNotifications as $notification){
            array_push($notifications, $notification);
        }

        return response()->json(compact('user', 'notifications'));
    }
}
