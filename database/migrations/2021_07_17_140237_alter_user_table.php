<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            /** Data */
            $table->string('genre')->nullable();
            $table->string('document')->unique();
            $table->date('date_of_birth')->nullable();
            $table->string('cover')->nullable();

            /** Address */
            $table->string('zipcode')->nullable();
            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->string('complement')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();

            /** Contact */
            $table->string('telephone')->nullable();
            $table->string('cell')->nullable();

            /** Access */
            $table->boolean('admin')->nullable();
            $table->boolean('client')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            /** Data */
            $table->dropColumn('genre');
            $table->dropColumn('document');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('cover');

            /** Address */
            $table->dropColumn('zipcode');
            $table->dropColumn('street');
            $table->dropColumn('number');
            $table->dropColumn('complement');
            $table->dropColumn('neighborhood');
            $table->dropColumn('state');
            $table->dropColumn('city');

            /** Contact */
            $table->dropColumn('telephone');
            $table->dropColumn('cell');

            /** Access */
            $table->dropColumn('admin');
            $table->dropColumn('client');
        });
    }
}
