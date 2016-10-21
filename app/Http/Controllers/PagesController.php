<?php

namespace App\Http\Controllers;


use Auth;
use App\User;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;

class PagesController extends Controller
{
	public function authPage()
	{
		return view('pages.auth');
	}

	public function getUpdateProfile()
	{
		return view('pages.update_profile');
	}

	public function getLogin()
	{
		return view('pages.login');
	}

	public function postLogin(Request $request)
	{
		$validator = Validator::make($request->all(), [
		    'email' 	=> 'required|exists:users|email',
		    'password' 	=> 'required',
		]);

		if ($validator->fails()) {
		    return redirect('login')
		                ->withErrors($validator)
		                ->withInput();
		}

		if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
		 	return redirect('/');
		}
		else
		{
			return "bad";
		}
	}

	public function getRegister()
	{
		return view('pages.register');
	}

	public function postRegister(Request $request)
	{
		$validator = Validator::make($request->all(), [
		    'email' 	=> 'required|unique:users|email',
		    'password' 	=> 'required',
		]);

		if ($validator->fails()) {
		    return redirect('register')
		                ->withErrors($validator)
		                ->withInput();
		}
		else
		{
			$create = [
				"email" => $request['email'],
				"password" => bcrypt($request['password'])
			];

			User::create($create);

			return redirect('login');
		}



		return $request->all();
	}
    
}
