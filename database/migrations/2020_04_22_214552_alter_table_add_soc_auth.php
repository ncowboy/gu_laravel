<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableAddSocAuth extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('social_network_id', 20)->default('');

            $table->enum('auth_type', ['web', 'vk', 'fb'])->default('web');

            $table->string('profile_pic', 120)->default('');

            $table->index('social_network_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn(['social_network_id', 'auth_type', 'profile_pic']);

        });
    }
}
