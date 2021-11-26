<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('hours')->insert([
            'day' => 'Sunday',
            'open' => '11:00 am',
            'close' => '9:00 pm',
            'hh_start' => '4:00 pm',
            'hh_end' => '6:00 pm',
        ]);
		DB::table('hours')->insert([
            'day' => 'Monday',
            'open' => '11:00 am',
            'close' => '9:00 pm',
        ]);
		DB::table('hours')->insert([
            'day' => 'Tuesday',
            'open' => '11:00 am',
            'close' => '9:00 pm',
        ]);
		DB::table('hours')->insert([
            'day' => 'Wednesday',
            'open' => '11:00 am',
            'close' => '9:00 pm',
        ]);
		DB::table('hours')->insert([
            'day' => 'Thursday',
            'open' => '11:00 am',
            'close' => '9:00 pm',
        ]);
		DB::table('hours')->insert([
            'day' => 'Friday',
            'open' => '11:00 am',
            'close' => '9:00 pm',
        ]);
		DB::table('hours')->insert([
            'day' => 'Saturday',
            'open' => '11:00 am',
            'close' => '9:00 pm',
        ]);
    }
}