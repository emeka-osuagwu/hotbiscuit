<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserQuestion extends Model
{
    protected $table = "user_questions";

    protected $fillable = [
        'answer',  
        'user_id',  
        'question_id',  
    ];

}
