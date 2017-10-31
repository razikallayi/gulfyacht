<?php

use Illuminate\Database\Seeder;

class AmentiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$amenties = [
    	['name' => 'Built in Wardrobes'],
    	['name' => 'Central A/C Balcony'],
    	['name' => 'Kitchen Appliances'],
    	['name' => 'Maids Room'],
    	['name' => 'Pets Allowed'],
    	['name' => 'Private Garden'],
    	['name' => 'Security Concierge'],
    	['name' => 'Shared Gym'],
    	['name' => 'Shared Pool'],
    	['name' => 'Walk-in Closet']
    	];

    	DB::table('amenties')->insert($amenties);
    }
}
