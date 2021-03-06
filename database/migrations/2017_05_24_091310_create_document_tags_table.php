<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('document_tags', function (Blueprint $table) {
            $table->increments('id');           
            $table->string('tag_name');           
            $table->smallInteger('status')->default(1);
            $table->integer('document_id')->unsigned();
            $table->foreign('document_id')->references('id')->on('documents');                   
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
        Schema::dropIfExists('document_tags');
    }
}
