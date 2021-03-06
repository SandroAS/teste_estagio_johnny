<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImagesTable extends Migration
{
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product');
            $table->string('path');
            $table->boolean('cover')->nullable();
            $table->timestamps();

            $table->foreign('product')->references('id')->on('products')->onDelete('CASCADE');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_images');
    }
}
