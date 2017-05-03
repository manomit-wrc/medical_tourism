<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicaltestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('medicaltests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('test_name');
            $table->smallInteger('status')->default(1);
            $table->integer('cat_id')->unsigned();
            $table->foreign('cat_id')->references('id')->on('medical_test_categories');
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
        Schema::dropIfExists('medicaltests');
    }
}
