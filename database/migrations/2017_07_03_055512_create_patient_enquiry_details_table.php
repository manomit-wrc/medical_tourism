<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientEnquiryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_enquiry_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_enquiry_id')->unsigned();
            $table->foreign('patient_enquiry_id')->references('id')->on('patient_enquiries');
            $table->integer('sender_id');
            $table->smallInteger('sender_type')->default(1)->comment = "1->admin,2->patient,3->hospital";
            $table->integer('reciever_id');
            $table->smallInteger('reciever_type')->default(1)->comment = "1->admin,2->patient,3->hospital";
            $table->text('subject');
            $table->text('message');
            $table->string('attachment');
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
       Schema::dropIfExists('patient_enquiry_details');
    }
}
