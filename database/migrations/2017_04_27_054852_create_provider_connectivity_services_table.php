<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProviderConnectivityServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('provider_connectivity_services', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('provider_connectivity_id')->unsigned();
          $table->foreign('provider_connectivity_id')->references('id')->on('provider_connectivities');
          $table->integer('connectivity_service_id')->unsigned();
          $table->foreign('connectivity_service_id')->references('id')->on('connectivity_services');
          $table->text('description');
          $table->smallInteger('status')->default('1');
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
        Schema::dropIfExists('provider_connectivity_services');
    }
}
