<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;



class AddUsernameToCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasColumn('comments', 'username')) {
} else {
        
        Schema::table('comments', function (Blueprint $table) {
            //
        $table->string('username')->nullable();
});
}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropColumn('username');
    }
}
