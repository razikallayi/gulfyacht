<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        File::deleteDirectory(public_path(App\Models\Product::IMAGE_LOCATION));

        factory(App\Models\Product::class, 10)->create();
    }
}
