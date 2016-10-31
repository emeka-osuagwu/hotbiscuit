<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->string('image')->nullable();
            $table->string('location')->nullable();
            $table->string('about')->nullable();
            $table->string('sex')->nullable();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->jsonb('questions')->nullable();
            $table->integer('age')->nullable();
            
            $table->integer('profile_status')->default(0);
            $table->integer('question_status')->default(0);
            
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
