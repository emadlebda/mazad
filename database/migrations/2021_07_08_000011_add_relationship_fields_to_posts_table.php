<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPostsTable extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id', 'brand_fk_3858928')->references('id')->on('brands');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id', 'category_fk_3858929')->references('id')->on('categories');

            $table->foreignId('user_id')->constrained();
        });
    }
}
