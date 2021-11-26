<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('contacts')->insert([
            'name' => 'Thai Time North Park',
            'desc' => 'Located in the North Park neighborhood of San Diego, we are a small local family-owned business where we strive to bring you a wonderful and delicious experience with each bite of our amazing and authentic Thai cuisine.',
            'street' => '4102 30th Street',
            'city' => 'San Diego',
            'state' => 'CA',
            'zip' => '92104',
            'phone' => '(619) 282-1060',
            'email' => 'thaitime30th@gmail.com',
            'manager' => 'Marie Trayrath, King Trayrath',
        ]);
    }
}
