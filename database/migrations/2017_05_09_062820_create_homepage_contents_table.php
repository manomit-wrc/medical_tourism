<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomepageContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('homepage_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->text('medical_category_description');
            $table->string('accomodation_left_title');
            $table->text('accomodation_left_description');
            $table->string('accomodation_left_image');
            $table->string('accomodation_middle_title');
            $table->text('accomodation_middle_description');
            $table->string('accomodation_middle_image');
            $table->string('accomodation_right_title');
            $table->text('accomodation_right_description');
            $table->string('accomodation_right_image');                    
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
        Schema::dropIfExists('homepage_contents');
    }
}
