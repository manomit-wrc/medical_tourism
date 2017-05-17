<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableMedicalTestCategoriesChangeCatId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medical_test_categories', function (Blueprint $table) {
            $table->renameColumn('cat_id', 'id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medical_test_categories', function (Blueprint $table) {
             Schema::dropIfExists('medical_test_categories');
        });
    }
}
