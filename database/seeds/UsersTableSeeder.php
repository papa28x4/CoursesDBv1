<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // factory(User::class, 8)->create();
    
        DB::table('users')->insert([
            [
                'name' => "Dannie Schoen",
                'email' => "DannieS@example.net",
                'password' => bcrypt('secret'),
                'is_admin' => false,
                'avatar' => '/images/users/6.jpg',
                'department' => 'Accounting',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => "Orion Jacobs",
                'email' => "OrionJ@example.net",
                'password' => bcrypt('secret'),
                'is_admin' => false,
                'avatar' => '/images/users/1.jpg',
                'department' => 'History',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => "Nadia McCulloug",
                'email' => "NadiaM@example.org",
                'password' => bcrypt('secret'),
                'is_admin' => false,
                'avatar' => '/images/users/5.jpg',
                'department' => 'Computer Science',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => "Felipe VonRueden",
                'email' => "FelipeV@example.com",
                'password' => bcrypt('secret'),
                'is_admin' => false,
                'avatar' => '/images/users/2.jpg',
                'department' => 'Electrical/Electronics',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => "Lempi Goodwin",
                'email' => "LempiG@example.com",
                'password' => bcrypt('secret'),
                'is_admin' => false,
                'avatar' => '/images/users/3.jpg',
                'department' => 'Chemical Engineering',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => "Leone Jakubowski",
                'email' => "LeoneJ@example.org",
                'password' => bcrypt('secret'),
                'is_admin' => false,
                'avatar' => '/images/users/7.jpg',
                'department' => 'Mathematics',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => "Stella Spencer",
                'email' => "StellaS@example.org",
                'password' => bcrypt('secret'),
                'is_admin' => false,
                'avatar' => '/images/users/8.jpg',
                'department' => 'Electrical/Electronics',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => "Hudson Fahey",
                'email' => "HudsonF@example.org",
                'password' => bcrypt('secret'),
                'is_admin' => false,
                'avatar' => '/images/users/4.jpg',
                'department' => 'Accounting',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => "Ekeoma",
                'email' => "swissfair@yahoo.co.uk",
                'password' => bcrypt('secret'),
                'is_admin' => true,
                'avatar' => '/images/users/9.jpg',
                'department' => null,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ]
        ]);
    }
}
