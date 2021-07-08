<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description');
            $table->decimal('orignal_price', 15, 2);
            $table->decimal('price', 15, 2);
            $table->string('exterior_color');
            $table->string('interior_color');
            $table->integer('city_mpg')->nullable();
            $table->integer('highway_mpg')->nullable();
            $table->string('transmission')->nullable();
            $table->string('engine')->nullable();
            $table->string('fuel_type');
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
