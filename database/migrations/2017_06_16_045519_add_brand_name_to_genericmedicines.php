<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBrandNameToGenericmedicines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   Schema::table('genericmedicines', function (Blueprint $table) {
         $table->string('brand_name')->after('generic_name_of_the_medicine');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('genericmedicines', function (Blueprint $table) {
        $table->dropColumn('brand_name');
       });
    }
}
