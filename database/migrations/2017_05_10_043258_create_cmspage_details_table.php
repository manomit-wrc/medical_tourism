<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmspageDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('cmspage_details', function (Blueprint $table) {
            $table->increments('id');           
            $table->string('slag');
            $table->text('description');
            $table->smallInteger('status')->default(1);
            $table->integer('cmspage_id')->unsigned();
            $table->foreign('cmspage_id')->references('id')->on('cmspages');                   
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
        Schema::dropIfExists('cmspage_details');
    }
}
