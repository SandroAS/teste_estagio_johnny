<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('sale');
            $table->unsignedInteger('owner');
            $table->unsignedInteger('acquirer');
            $table->unsignedInteger('product');
            $table->double('price');
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('owner')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('acquirer')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('product')->references('id')->on('products')->onDelete('CASCADE');
        });
    }

    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
