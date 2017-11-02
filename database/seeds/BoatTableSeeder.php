<?php

use Illuminate\Database\Seeder;

class BoatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        File::deleteDirectory(public_path(App\Models\Boat::IMAGE_LOCATION));

        factory(App\Models\Boat::class, 10)->create()->each(function($boat) {
             $boat->medias()->save(factory(App\Models\Media::class)->make());
         });
    }
}
