<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWmParseErrorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('wm_parse_errors', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('filename');
            $table->string('error_message');
            $table->date('first_parse_attempt');
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
        Schema::dropIfExists('wm_parse_errors');
    }
}
