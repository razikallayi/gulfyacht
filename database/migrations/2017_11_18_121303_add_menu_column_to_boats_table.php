<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMenuColumnToBoatsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::table('boats', function (Blueprint $table) {
            $table->enum('menu', ['boats', 'inventory']);
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::table('boats', function (Blueprint $table) {
            $table->dropColumn(['menu']);
        });
    }
}
