<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 64);
            $table->bigInteger('author_id')->nullable(false)->unsigned()->index();
            $table->bigInteger('category_id')->nullable(false)->unsigned()->index();
            $table->string('text_short', 256)->nullable(false);
            $table->text('text_full')->nullable(false);
            $table->boolean('active')->default(1)->index()->nullable(false);
            $table->timestamps();
        });

        Schema::table('news', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('users')->onDelete('CASCADE');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropForeign(['author_id']);

            $table->dropForeign(['category_id']);
        });

        Schema::dropIfExists('news');
    }
}
