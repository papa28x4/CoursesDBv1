<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
    Route::post('/register', 'RegisterController');
    Route::post('/login', 'LoginController');
    Route::get('/logout', 'LogoutController');
    Route::get('/me', 'UserProfileController');
    Route::get('/dashboard', 'DashboardController');
    Route::apiResource('/students', 'StudentsController');
    Route::apiResource('/courses', 'CoursesController');
    Route::get('/course-list', 'SingleStudentController@indexCourses');
    // Route::put('/course-list/{student}', 'SingleStudentController@getCourses');
    Route::put('/course-list/{std}', 'SingleStudentController@updateCourses');
});