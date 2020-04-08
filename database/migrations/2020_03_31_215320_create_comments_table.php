<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('author_id')->unsigned()->nullable(false)->index();
            $table->bigInteger('article_id')->unsigned()->nullable(false)->index();
            $table->text('comment')->nullable(false);
            $table->timestamps();
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('users')->onDelete('CASCADE');

            $table->foreign('article_id')->references('id')->on('news')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['author_id']);

            $table->dropForeign(['article_id']);
        });

        Schema::dropIfExists('comments');
    }
}
