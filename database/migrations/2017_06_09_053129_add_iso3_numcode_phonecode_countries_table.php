<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIso3NumcodePhonecodeCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->char('iso3',3)->after('nicename');
            $table->smallInteger('numcode')->after('iso3');
            $table->integer('phonecode')->after('numcode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->dropColumn('iso3');
            $table->dropColumn('numcode');
            $table->dropColumn('phonecode');
        });
    }
}
