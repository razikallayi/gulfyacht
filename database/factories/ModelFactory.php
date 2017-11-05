<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
/*
    $statuses = ['active','inactive'];
    $status = $statuses[array_rand($statuses)];*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Models\Boat::class, function (Faker\Generator $faker) {
    $title = $faker->sentence($nbWords = 6, $variableNbWords = true);
    $slug = str_slug($title);
    $brandId = App\Models\Brand::inRandomOrder()->first()->id;
    $typeId = App\Models\BoatType::inRandomOrder()->first()->id;
    return [
        'title'            => $title,
        'slug'             => $slug,
        'brand_id'         => $brandId,
        'type_id'          => $typeId,
        'location'         => $faker->streetAddress,
        'price'            => $faker->randomNumber(6),
        'currency'         => 'QAR',
        'length'           => $faker->randomNumber(3),
        'year'             => $faker->year,
        'condition'        => $faker->word,
        
        'email'            => $faker->unique()->safeEmail,
        'phone'            => $faker->e164PhoneNumber,
        'description'      => $faker->realText(200),

        'length_overall'   => $faker->numberBetween(100),
        'beam'             => $faker->randomNumber(3),
        'draft'            => $faker->randomNumber(3),
        'engine'           => $faker->randomNumber(3),
        'power'            => $faker->randomNumber(4),
        'engine_hours'     => $faker->randomNumber(1),
        'fuel'             => $faker->randomNumber(3),
        'max_speed'        => $faker->randomNumber(3),
        'cruising_speed'   => $faker->randomNumber(3),

        'no_of_cabins'     => $faker->randomNumber(1),
        'no_of_berths'     => $faker->randomNumber(1),
        'no_of_heads'      => $faker->randomNumber(1),
        'crew'             => $faker->randomNumber(1),

        'is_featured'      => $faker->boolean,
        'is_published'     => $faker->boolean,
        'listing_order'    => $faker->randomNumber(1),
        'status'           => 'active',
    ];
});


$factory->define(App\Models\Brand::class, function (Faker\Generator $faker) {
    $location = 'public/'.App\Models\Brand::IMAGE_LOCATION;
    $image = App\Helpers\Helper::uploadImage($faker->imageUrl(200,120),$location);
    $filename = $image->getData()->filename;

    $title =  $faker->word;
    $slug = str_slug($title);
    return [
       'name'           => $title,
       'slug'            => $slug,
       'url'             => $faker->url,
       'image'           => $filename,
       'description'     => $faker->sentence($nbWords = 6, $variableNbWords = true),
       'is_featured'     => $faker->boolean,
       'is_published'    => $faker->boolean,
       'listing_order'   => $faker->randomNumber(1),
       'status'          => 'active',
    ];
});



$factory->define(App\Models\Product::class, function (Faker\Generator $faker) {
    $location = 'public/'.App\Models\Product::IMAGE_LOCATION;
    $image = App\Helpers\Helper::uploadImage($faker->imageUrl(200,120),$location);
    $filename = $image->getData()->filename;

    $title =  $faker->word;
    $slug = str_slug($title);
        $brandId = App\Models\Brand::inRandomOrder()->first()->id;
    return [
        'brand_id'         => $brandId,
       'name'           => $title,
       'slug'            => $slug,
       'url'             => $faker->url,
       'image'           => $filename,
       'description'     => $faker->sentence($nbWords = 6, $variableNbWords = true),
       'is_featured'     => $faker->boolean,
       'is_published'    => $faker->boolean,
       'listing_order'   => $faker->randomNumber(1),
       'status'          => 'active',
    ];
});




$factory->define(App\Models\Media::class, function (Faker\Generator $faker) {
    $location = 'public/'.App\Models\Boat::IMAGE_LOCATION;
    $image = App\Helpers\Helper::uploadImage($faker->imageUrl(800,446),$location);
    $filename = $image->getData()->filename;

    $boatId = App\Models\Boat::inRandomOrder()->first()->id;
    return [
       'file_name'    => $filename,
       'file_type'   => 'image',
       'table_name'  => 'boats',
       'item_id'     => $boatId,
    ];
});
