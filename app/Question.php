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
	    'question',
	    'option_1',
	    'option_2',
	    'option_1_point',
	    'option_2_point',
	];

}
