<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
	    'answer',
	    'option_1',
	    'option_2',
	    'question_1',
	    'question_2',
	];

}
