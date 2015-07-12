<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostVotesTable extends Migration
{
    public function up()
    {
        Schema::create('post_votes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('type', 4);
            $table->integer('user_id')->unsigned();
            $table->integer('post_id')->unsigned();
        });
    }

    public function down()
    {
        Schema::drop('post_votes');
    }
}