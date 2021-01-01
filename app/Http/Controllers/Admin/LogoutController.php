<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;

class LogoutController extends Controller
{
    public function __invoke()
    {
    
        try{
            
            Auth::logout();
            // $user = Auth::user();
            // return $user;
            return 'user logged out';
        }catch (JWTException $e) {
            return response()->json(['error' => 'logout failed'], 500);
        }
        
        
        // return redirect('/login');
    }
}
