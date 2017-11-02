<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boats', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->string('brand_id')->nullable();
            $table->string('type_id')->nullable();
            $table->double('price')->nullable();
            $table->string('currency')->nullable();
            $table->integer('year')->nullable();
            $table->string('location')->nullable();
            $table->string('condition')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            $table->string('length_overall')->nullable();
            $table->string('beam')->nullable();
            $table->string('draft')->nullable();
            $table->string('engine')->nullable();
            $table->string('power')->nullable();
            $table->string('engine_hours')->nullable();
            $table->string('fuel')->nullable();
            $table->string('max_speed')->nullable();
            $table->string('cruising_speed')->nullable();

            $table->string('no_of_cabins')->nullable();
            $table->string('no_of_berths')->nullable();
            $table->string('no_of_heads')->nullable();
            $table->string('crew')->nullable();

            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->integer('listing_order')->nullable();
            $table->string('status')->nullable();

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
        Schema::dropIfExists('boats');
    }
}
