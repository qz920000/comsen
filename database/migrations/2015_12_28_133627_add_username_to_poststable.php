<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsernameToPoststable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasColumn('posts', 'username')) {
} else {
        
        Schema::table('posts', function (Blueprint $table) {
            //
        $table->string('username')->nullable();
});
}
    }
    
//    public function up()
//{
//if(Schema::hasColumn('comments', 'post_type')) {
//} else {
//Schema::table('comments', function (Blueprint $table) {
//$table->string('post_type')->nullable();
//});
//}
//}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('username');
        });
    }
}
