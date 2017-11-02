<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');

            $table->string('file_name')->nullable();
            $table->string('file_type')->nullable();
            $table->string('table_name')->nullable();
            $table->string('item_id')->nullable();
            $table->boolean('is_thumbnail')->default(false);
            $table->boolean('is_published')->default(true);
            $table->integer('listing_order')->nullable();

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
        Schema::dropIfExists('media');
    }
}
