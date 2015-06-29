<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Setup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user', function(Blueprint $table)
      {
        $table->increments('id');
        $table->string('first_name');
        $table->string('last_name');
        $table->string('slug')->index();
        $table->string('email')->unique();
        $table->string('password', 60);
        $table->rememberToken();
        $table->timestamps();
      });

      Schema::create('articles', function(Blueprint $table)
      {
        $table->increments('id');
        $table->string('title');
        $table->string('slug')->index();
        $table->longText('body');
        $table->boolean('is_published');
        $table->dateTime('published_at');
        $table->string('meta_keys');
        $table->string('meta_description');
        $table->integer('user_id')->unsigned()->index();
        $table->timestamps();
      });

      Schema::create('categories', function(Blueprint $table)
      {
        $table->increments('id');
        $table->string('name');
        $table->string('slug')->index();
        $table->text('description');
        $table->timestamps();
      });

      Schema::create('article_category', function(Blueprint $table)
      {
        $table->increments('id');
        $table->integer('article_id')->unsigned();
        $table->integer('category_id')->unsigned();
        $table->timestamps();
      });







    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('user');
      Schema::drop('articles');
      Schema::drop('categories');
      Schema::drop('article_category');
    }
}
