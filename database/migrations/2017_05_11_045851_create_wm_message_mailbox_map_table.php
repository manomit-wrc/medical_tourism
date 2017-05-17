<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWmMessageMailboxMapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wm_message_mailbox_map', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('message_id')->unsigned();
            $table->foreign('message_id')->references('id')->on('wm_messages');
            $table->char('seen_p', 1)->default('f'); 
            $table->char('answered_p', 1)->default('f'); 
            $table->char('flagged_p', 1)->default('f'); 
            $table->char('deleted_p', 1)->default('f'); 
            $table->char('draft_p', 1)->default('f'); 
            $table->char('recent_p', 1)->default('f');       
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
        Schema::dropIfExists('wm_message_mailbox_map');
    }
}
