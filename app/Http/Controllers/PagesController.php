<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class PagesController extends Controller
{
	public function authPage()
	{
		return view('pages.auth');
	}
    
}
