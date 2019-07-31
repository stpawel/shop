<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users',function(Blueprint $table){
            $table->string('surname');
            $table->string('street');
            $table->string('number');
            $table->string('postcode');
            $table->string('city');
            $table->string('phone');
            $table->string('status');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('users',function(Blueprint $table){
            $table->dropColumn('surname');
            $table->dropColumn('street');
            $table->dropColumn('number');
            $table->dropColumn('postcode');
            $table->dropColumn('city');
            $table->dropColumn('phone');
            $table->dropColumn('status');
        });

    }
}
