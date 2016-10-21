<?php

namespace App\Http\Controllers;


use Auth;
use Session;
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

	public function getUsers()
	{
		if (Auth::user()->profile_status == 0) 
		{
			return redirect('profile');
		}

		if (Auth::user()->question_status == 0) 
		{
			return redirect('question/select');
		}

		$users = User::all()->take(10);
		return view('pages.users', compact('users'));
	}

	public function getUpdateProfile()
	{
		return view('pages.update_profile');
	}

	public function postUpdateProfile(Request $request)
	{
		$user = User::find(Auth::user()->id);

		$user->sex 			= $request->sex;
		$user->age 			= $request->age;
		$user->email 		= $request->email;
		$user->phone 		= $request->phone;
		$user->about 		= $request->about;
		$user->location 	= $request->location;
		$user->username 	= $request->username;
		$user->profile_status 	= 1;

		$user->save();
		Session::flash('profile-updated', 'good');
		return redirect('profile');
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
		 	Session::flash('login-sucsses', 'good');
		 	return redirect('login');
		}
		else
		{
			Session::flash('login-faild', 'good');
		 	return redirect('login');
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

			Session::flash('register-sucsses', 'good');

			return redirect('register');
		}



		return $request->all();
	}

	public function selectQuestion()
	{
		return view('pages.question_select');
	}
    
}
