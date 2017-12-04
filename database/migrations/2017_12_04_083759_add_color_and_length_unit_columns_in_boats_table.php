<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColorAndLengthUnitColumnsInBoatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('boats', function (Blueprint $table) {
           $table->double('length_in_unit')->default(0)->after('length');
           $table->string('length_unit')->default('Feet')->after('length_in_unit');
           $table->string('color')->nullable()->after('length_unit');
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
           $table->dropColumn(['color','length_in_unit','length_unit']);
       });
    }
}
