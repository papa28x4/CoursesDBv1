<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SingleStudentController extends Controller
{
    public function indexCourses()
    {
        $courses = Course::orderBy('title', 'asc')->get();
        return response()->json(['courses' => $courses], 200);
    }

    public function updateCourses(Request $request, User $student){
        $status = $student->courses()->sync($request->courses);
        return $status;
    }
}
