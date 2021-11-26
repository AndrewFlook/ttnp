<?php

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
		DB::table('users')->insert([
            'name' => 'Thai Time North Park',
            'email' => 'thaitime30th@gmail.com',
            'password' => bcrypt('wjc$LjS9a*v4'),
        ]);
    }
}
