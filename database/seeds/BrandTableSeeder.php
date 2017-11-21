<?php

use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        File::deleteDirectory(public_path(App\Models\Brand::IMAGE_LOCATION));

        factory(App\Models\Brand::class,10)->create();
    }
}
