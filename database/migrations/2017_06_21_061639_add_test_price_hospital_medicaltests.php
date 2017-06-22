<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTestPriceHospitalMedicaltests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hospital_medicaltests', function (Blueprint $table) {
            $table->string('test_price')->after('medicaltest_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hospital_medicaltests', function (Blueprint $table) {
            $table->dropColumn('test_price');
        });
    }
}
