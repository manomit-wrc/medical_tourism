<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCountryIdCityIdImmigrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('immigrations', function (Blueprint $table) {
            $table->string('country_id')->after('address');
            $table->string('state_id')->after('country_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('immigrations', function (Blueprint $table) {
           $table->dropColumn('country_id');
           $table->dropColumn('state_id');
        });
    }
}
