<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayedQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('played_questions', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('status')->default(0);
            $table->integer('owner_id')->nullable();
            $table->integer('player_id')->nullable();
            $table->integer('question_id')->nullable();
            $table->string('answer')->nullable();
            
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
        Schema::drop('played_questions');
    }
}
