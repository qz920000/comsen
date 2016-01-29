<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsernameAcCodeActiveToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    
    
      public function up()
    {
        if(Schema::hasColumn('users', 'username')) {
            } else {

                    Schema::table('users', function (Blueprint $table) {
                        //
                    $table->string('username')->nullable();
            });
            }
            if(Schema::hasColumn('users', 'activation_code')) {
            } else {

                    Schema::table('users', function (Blueprint $table) {
                        //
                    $table->string('activation_code')->after('password');
                     $table->integer('active')->default(0)->after('activation_code');
                    
                   // $table->string('username')->nullable();
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
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('username');
        });
        }
//    public function up()
//    {
//        //
//    }
//
//    /**
//     * Reverse the migrations.
//     *
//     * @return void
//     */
//    public function down()
//    {
//        //
//    }
}
