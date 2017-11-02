<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoatTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boat_types', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->integer('listing_order')->nullable();
            $table->boolean('is_published')->default(true);
            $table->string('status')->nullable();

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
        Schema::dropIfExists('boat_types');
    }
}
