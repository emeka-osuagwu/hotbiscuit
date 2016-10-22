<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayedQuestions extends Model
{
    protected $table = "played_questions";

    protected $fillable = [
        'answer',
        'status',  
        'owner_id',  
        'player_id',  
        'question_id',  
    ];
}
