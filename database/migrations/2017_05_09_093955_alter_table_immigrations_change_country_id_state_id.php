<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableImmigrationsChangeCountryIdStateId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('immigrations', function (Blueprint $table) {
            $table->integer('state_id')->unsigned()->change();
            $table->integer('country_id')->unsigned()->change();
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('country_id')->references('id')->on('countries');
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
           $table->drop_index('immigrations_state_id_foreign');
           $table->drop_index('immigrations_country_id_foreign');
        });
    }
}
