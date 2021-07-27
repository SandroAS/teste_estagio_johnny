<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category');
            $table->string('type');
            $table->unsignedInteger('user');

            /** pricing and values */
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->decimal('promotion_price', 10, 2)->nullable();

            /** description */
            $table->text('description')->nullable();

            /** address */
            $table->string('zipcode')->nullable();
            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->string('complement')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();

            /** color */
            $table->boolean('white')->nullable();
            $table->boolean('black')->nullable();
            $table->boolean('blue')->nullable();
            $table->boolean('green')->nullable();
            $table->boolean('yellow')->nullable();
            $table->boolean('red')->nullable();
            $table->boolean('pink')->nullable();
            $table->boolean('purple')->nullable();
            $table->boolean('gray')->nullable();
            $table->boolean('brown')->nullable();
            $table->boolean('beige')->nullable();
            $table->boolean('silver')->nullable();
            $table->boolean('golden')->nullable();

            $table->timestamps();

            $table->foreign('user')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}