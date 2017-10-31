<?php

use Illuminate\Database\Seeder;

class PropertyTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        	$propertyTypes = [
    	['name' => 'Apartment'],
    	['name' => 'Villa'],
    	['name' => 'Townhouse'],
    	['name' => 'Penthouse'],
        ['name' => 'Compound'],
        ['name' => 'House'],
    	['name' => 'Condo'],
    	['name' => 'Duplex'],
    	['name' => 'Whole Building'],
    	['name' => 'Bulk Rent Units'],
    	['name' => 'Hotel Apartments'],
    	['name' => 'Labor Camp'],
    	['name' => 'Staff Accommodation']
    	];

    	DB::table('property_types')->insert($propertyTypes);
    }
}
