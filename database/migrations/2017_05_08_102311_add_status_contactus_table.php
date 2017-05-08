<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusContactusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contactus', function (Blueprint $table) {
          $table->integer('status')->default(1)->after('message')->comment = "0->Delete 1->New 2->View 3->Replied";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contactus', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
