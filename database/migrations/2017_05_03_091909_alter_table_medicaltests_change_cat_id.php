<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableMedicaltestsChangeCatId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicaltests', function (Blueprint $table) {
            $table->renameColumn('cat_id','medicaltestcategories_id');
            $table->integer('medicaltestcategories_id')->unsigned();
            $table->foreign('medicaltestcategories_id')->references('id')->on('medical_test_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicaltests', function (Blueprint $table) {
            Schema::dropIfExists('medicaltests');
        });
    }
}
