<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWmHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wm_headers', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('message_id')->unsigned();
            $table->foreign('message_id')->references('id')->on('wm_messages');
            $table->string('name');
            $table->string('lower_name');
            $table->string('value');
            $table->string('email_value');
            $table->string('name_value');
            $table->integer('sort_order');  
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
        Schema::dropIfExists('wm_headers');
    }
}
