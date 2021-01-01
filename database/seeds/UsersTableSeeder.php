<?php

use App\User;
use Illuminate\Database\Seeder;

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
        User::create([
            'name' => "Ekeoma",
            'email' => "swissfair@yahoo.co.uk",
            'password' => bcrypt('secret'),
            'is_admin' => true,
            'avatar' => '/images/users/9.jpg',
            'department' => null
        ]);
    }
}
