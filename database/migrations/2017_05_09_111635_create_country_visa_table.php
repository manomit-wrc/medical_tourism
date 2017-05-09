<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryVisaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_visa', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('country_id')->unsigned();
          $table->foreign('country_id')->references('id')->on('countries');
           $table->string('upload_pdf');
          $table->smallInteger('status')->default(1);
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
        Schema::dropIfExists('country_visa');
    }
}
