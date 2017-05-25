<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDocumentTagsChangeDocumentId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('document_tags', function (Blueprint $table) {
             $table->dropForeign('document_tags_document_id_foreign');
             $table->dropColumn('document_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('document_tags', function (Blueprint $table) {
            //
        });
    }
}
