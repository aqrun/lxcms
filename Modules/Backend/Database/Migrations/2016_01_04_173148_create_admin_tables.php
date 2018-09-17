<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 190)->unique();
            $table->string('password', 60);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile', 20)->default('');
            $table->integer('weight')->default(0);
            $table->tinyInteger('status')->default(1)->comment('status 0:frozen  1:active');
            $table->tinyInteger('gender')->default(0)->comment('性别 0:男  1：女');
            $table->integer('birthday')->default(0);
            $table->string('avatar')->default('');
            $table->string('timezone', 64)->default('');
            $table->string('remember_token', 100)->default('');
            $table->timestamps();
        });

        Schema::create('admin_operation_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_user_id');
            $table->string('path');
            $table->string('method', 10);
            $table->string('ip', 15);
            $table->text('input');
            $table->index('admin_user_id');
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

        Schema::dropIfExists('admin_users');
        Schema::dropIfExists('admin_operation_logs');
    }
}
