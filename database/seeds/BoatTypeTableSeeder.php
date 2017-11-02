<?php

use Illuminate\Database\Seeder;

class BoatTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $boatTypes = [
           ['name' => 'New'],
           ['name' => 'Used'],
           ['name' => 'Sell'],
           ['name' => 'Buy'],
       ];

       DB::table('boat_types')->insert($boatTypes);
   }
}
