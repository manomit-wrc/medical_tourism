<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('patient_enquiries', function (Blueprint $table) {
            $table->increments('id');
            $table->text('subject');
            $table->integer('patient_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('patients');
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
         Schema::dropIfExists('patient_enquiries');
    }
}
