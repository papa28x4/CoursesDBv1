<?php

use App\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Course::truncate();
        DB::table('courses')->insert([
                    [
                        "code" => "ENG201",
                        "title" => "Engineering Material",
                        "units" => 3,
                    ],
                    [
                        "code" => "ENG203",
                        "title" => "Thermodynamics",
                        "units" => 3,
                    ],
                    [
                        "code" => "ENG205",
                        "title" => "Engineering Workshop",
                        "units" => 1,
                    ],
                    [
                        "code" => "ENG211",
                        "title" => "Engineering Drawing",
                        "units" => 2,
                    ],
                    [
                        "code" => "EEE201",
                        "title" => "Introduction to Electrical Engineering",
                        "units" => 3,
                    ],
                    [
                        "code" => "EEE203",
                        "title" => "Electrical Networks",
                        "units" => 2,
                    ],
                    [
                        "code" => "EEE205",
                        "title" => "Signals and Systems",
                        "units" => 2,
                    ],
                    [
                        "code" => "CHE201",
                        "title" => "Organic Chemistry",
                        "units" => 3,
                    ],
                    [
                        "code" => "CHE203",
                        "title" => "Petrochemicals",
                        "units" => 3,
                    ],
                    [
                        "code" => "CHE205",
                        "title" => "Impact Analysis",
                        "units" => 3,
                    ],
                    [
                        "code" => "CHE209",
                        "title" => "Manufacturing",
                        "units" => 3,
                    ],
                    [
                        "code" => "MTH201",
                        "title" => "Differential Equations I",
                        "units" => 3,
                    ],
                    [
                        "code" => "MTH203",
                        "title" => "Numerical Analysis I",
                        "units" => 3,
                    ],
                    [
                        "code" => "MTH205",
                        "title" => "Algebra II",
                        "units" => 2,
                    ],
                    [
                        "code" => "MTH213",
                        "title" => "Calculus III",
                        "units" => 2,
                    ],
                    [
                        "code" => "MTH215",
                        "title" => "Geometry II",
                        "units" => 3,
                    ],
                    [
                        "code" => "CSC201",
                        "title" => "Introduction to Computing",
                        "units" => 2,
                    ],
                    [
                        "code" => "CSC203",
                        "title" => "Algorithms I",
                        "units" => 3,
                    ],
                    [
                        "code" => "CSC205",
                        "title" => "Web Programming I",
                        "units" => 3
                    ],
                    [
                        "code" => "CSC207",
                        "title" => "Systems Design",
                        "units" => 2
                    ],
                    [
                        "code" => "ACC201",
                        "title" => "Risk Analysis",
                        "units" => 3
                    ],
                    [
                        "code" => "ACC205",
                        "title" => "Introduction to Auditing",
                        "units" => 3,
                    ],
                    [
                        "code" => "ACC207",
                        "title" => "Budgeting",
                        "units" => 2,
                    ],
                    [
                        "code" => "ACC213",
                        "title" => "Cost Analysis",
                        "units" => 3,
                    ],
                    [
                        "code" => "ACC219",
                        "title" => "Stock Markets",
                        "units" => 2,
                    ],
                    [
                        "code" => "HIS201",
                        "title" => "History of Nigeria 1500-1599",
                        "units" => 3,
                    ],
                    [
                        "code" => "HIS203",
                        "title" => "International relations",
                        "units" => 2,
                    ],
                    [
                        "code" => "HIS205",
                        "title" => "Slave Trade",
                        "units" => 2,
                    ],
                    [
                        "code" => "HIS207",
                        "title" => "The Nigerian civil war",
                        "units" => 3,
                    ],
                    [
                        "code" => "HIS209",
                        "title" => "Pyschology of coups",
                        "units" => 2,
                    ],
                    [
                        "code" => "HIS211",
                        "title" => "The African Monarchical System",
                        "units" => 3,
                    ],
                    [
                        "code" => "GNS201",
                        "title" => "Writing and Literary Appreciation",
                        "units" => 2,
                    ],
                    [
                        "code" => "GNS205",
                        "title" => "Psychology",
                        "units" => 2,
                    ],
                    [
                        "code" => "GNS207",
                        "title" => "Logic and History of Science",
                        "units" => 1,
                    ],
                    [
                        "code" => "GNS211",
                        "title" => "Citizen Education",
                        "units" => 1,
                    ],
                    [
                        "code" => "GNS213",
                        "title" => "Communication Skills",
                        "units" => 1,
                    ],
                    [
                        "code" => "GNS217",
                        "title" => "Use of Library",
                        "units" => 1,
                    ]
        ]);
    }
}
