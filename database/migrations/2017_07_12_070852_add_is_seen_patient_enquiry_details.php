<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsSeenPatientEnquiryDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('patient_enquiry_details', function($table) {
        $table->integer('is_seen')->after('attachment');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient_enquiry_details', function($table) {
           $table->dropColumn('is_seen');
        });
    }
}
