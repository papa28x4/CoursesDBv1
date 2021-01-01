<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;

use App\Course;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('created_at', 'desc')->paginate(5);
        return response()->json(['courses' => $courses], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [ 
            'code' => 'required|size:6', 
            'title' => 'required|min:2', 
            'units' => 'required|numeric', 
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 422);            
        }

        $course = Course::create($validator->validated());
        
        return response()->json([
            'course' => $course,
            'message' => 'Course successfully created',
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return response()->json(['course' => $course], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $validator = Validator::make($request->all(), [ 
            'code' => 'required|size:6', 
            'title' => 'required|min:2', 
            'units' => 'required|numeric', 
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 422);            
        }

        $updated = tap($course)->update($validator->validated());
       
        return response()->json([
            'course' => $updated,
            'message' => $updated? 'Course Updated' : 'Error Updating Course'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $deleted = tap($course)->delete();

        return response()->json([
            'course' => $deleted,
            'message' => $deleted? 'Course Deleted' : 'Error Deleting Course'
        ]);
    }
}
