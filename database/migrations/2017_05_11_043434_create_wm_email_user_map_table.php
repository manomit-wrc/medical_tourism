<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWmEmailUserMapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wm_email_user_map', function (Blueprint $table) {
            $table->increments('id');           
            $table->string('email_user_name');
            $table->integer('domain_id')->unsigned();
            $table->foreign('domain_id')->references('id')->on('wm_domains');
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
        Schema::dropIfExists('wm_email_user_map');
    }
}
