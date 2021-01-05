<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CourseUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        // DB::table('course_user')->truncate();
        DB::table('course_user')->insert([
            [
                'course_id'=> 4,
                'user_id' => 3
            ],
            [
                'course_id'=> 5,
                'user_id' => 3
            ],
            [
                'course_id'=> 16,
                'user_id' => 2
            ],
            [
                'course_id'=> 17,
                'user_id' => 1
            ],
            [
                'course_id'=> 22,
                'user_id' => 2
            ],
            [
                'course_id'=> 23,
                'user_id' => 4
            ],
            [
                'course_id'=> 27,
                'user_id' => 1
            ],
            [
                'course_id'=> 27,
                'user_id' => 2
            ],
            [
                'course_id'=> 35,
                'user_id' => 3
            ],
            [
                'course_id'=> 35,
                'user_id' => 8
            ],
            [
                'course_id'=> 35,
                'user_id' => 4
            ],
            [
                'course_id'=> 36,
                'user_id' => 1
            ],
            [
                'course_id'=> 14,
                'user_id' => 5
            ],
            [
                'course_id'=> 20,
                'user_id' => 5
            ],
            [
                'course_id'=> 15,
                'user_id' => 3
            ]
        ]);
    }
}
