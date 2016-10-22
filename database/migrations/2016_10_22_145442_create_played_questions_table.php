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
            $table->integer('owner_id');
            $table->integer('player_id');
            $table->integer('question_id');
            $table->string('answer');
            
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
