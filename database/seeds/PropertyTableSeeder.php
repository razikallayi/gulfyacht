<?php

use Illuminate\Database\Seeder;

class PropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Property::class, 50)->create()->each(function($prop) {
             $prop->medias()->save(factory(App\Models\Media::class)->make());
         });
    }
}
