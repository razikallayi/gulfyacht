<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->string('category_id')->nullable();
            $table->string('property_type_id')->nullable();
            $table->integer('price')->nullable();
            $table->string('currency')->nullable();
            $table->string('rental_period')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->integer('bedroom')->nullable();
            $table->integer('bathroom')->nullable();
            $table->integer('area')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email')->nullable();
            $table->string('furnished')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();

            $table->text('title_ar')->nullable();
            $table->text('description_ar')->nullable();

            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->integer('listing_order')->nullable();

            $table->index('slug');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
