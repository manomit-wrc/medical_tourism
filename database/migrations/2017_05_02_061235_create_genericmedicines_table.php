<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenericmedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genericmedicines', function (Blueprint $table) {
          $table->increments('id');
          $table->string('generic_name_of_the_medicine');
		  $table->string('unit');
          $table->double('price', 15, 2);
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
        Schema::dropIfExists('genericmedicines');
    }
}
