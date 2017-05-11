<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWmRecipientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('wm_recipients', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('message_id')->unsigned();
            $table->foreign('message_id')->references('id')->on('wm_messages');
            $table->string('header');
            $table->string('email');
            $table->string('name');      
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
         Schema::dropIfExists('wm_recipients');
    }
}
