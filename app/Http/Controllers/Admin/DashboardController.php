<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
Use App\Course;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $courses = count(Course::all());
        $students = count(User::where('is_admin', false)->get());
        $admins = count(User::where('is_admin', true)->get());
        return response()->json(compact('courses', 'students', 'admins'));
    }
}
