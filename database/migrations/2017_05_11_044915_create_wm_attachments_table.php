<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWmAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wm_attachments', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('message_id')->unsigned();
            $table->foreign('message_id')->references('id')->on('wm_attachments');          
            $table->string('filename');
            $table->string('content_type');
            $table->text('data');
            $table->string('format');             
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
        Schema::dropIfExists('wm_attachments');
    }
}
