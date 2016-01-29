<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPostIdToFileentriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::table('fileentries', function (Blueprint $table) {
            if(Schema::hasColumn('fileentries', 'post_id')) {
                } else {
                Schema::table('fileentries', function (Blueprint $table) {
                $table->integer('post_id');
                });
                }
       // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fileentries', function (Blueprint $table) {
            $table->dropColumn('post_id');
        });
    }
}
