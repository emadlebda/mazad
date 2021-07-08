<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBidsTable extends Migration
{
    public function up()
    {
        Schema::table('bids', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id')->after('id');
            $table->foreign('post_id', 'post_fk_4343353')->references('id')->on('posts');
            $table->unsignedBigInteger('user_id')->after('post_id');
            $table->foreign('user_id', 'user_fk_4343354')->references('id')->on('users');
        });
    }
}
