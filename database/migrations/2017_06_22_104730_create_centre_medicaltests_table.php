<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentreMedicaltestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('centre_medicaltests', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('testcentre_id')->unsigned();
            $table->foreign('testcentre_id')->references('id')->on('testcenters');
            $table->integer('medicaltest_id')->unsigned();
            $table->foreign('medicaltest_id')->references('id')->on('medicaltests');
            $table->double('test_price', 15, 2);
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
        Schema::dropIfExists('centre_medicaltests');
    }
}
