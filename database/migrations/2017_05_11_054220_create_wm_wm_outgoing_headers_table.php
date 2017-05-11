<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWmWmOutgoingHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wm_outgoing_headers', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('name');
            $table->string('value');
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
        Schema::dropIfExists('wm_outgoing_headers');
    }
}
