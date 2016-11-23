<?php

namespace App\Http\Controllers;


use Auth;
use Session;
use App\User;
use Validator;
use App\Question;
use App\UserQuestion;
use App\Http\Requests;
use App\PlayedQuestions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input as Input;

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

		if (Question::all()->count() < 1) 
		{
			return redirect('magic_route_only_anakle_can_see');	
		}

		if (Auth::user()->question_status == 0) 
		{
			return redirect('question/select');
		}

		$users = User::where('profile_status', 1)->get()->take(10);

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
		// $user->image 		= $this->cloudderRepo->getImageUrl();
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
		$user_questions = User::find(Auth::user()->id)->questions;
		
		$can_add = true;

		if (collect($user_questions)->count() == 15) {
			$can_add = false;
			$this->changeQuestonStatus();
		}

		$question 			= Question::all()->except($user_questions)->random(1);
		
		$question_number 	= collect($user_questions)->count() + 1;
		
		return view('pages.question_select', compact('question', 'question_number', 'can_add'));
	}

	public function postUserAddQuestion(Request $request)
	{
		return $request->all();
		$question = [
			"answer" 		=> trim($request['answer']),
			"user_id" 		=> Auth::user()->id,
			"question_id" 	=> (int) $request['question_id']
		];

		$user_questions =  UserQuestion::create($question);

		$user = User::find(Auth::user()->id);

		if ($user->questions == null || $user_questions == '') 
		{
			$user->questions = [$user_questions->id];
		}
		else
		{
			$data = $user->questions;
			array_push($data, $user_questions->id);
			$user->questions = $data;
		}

		$user->save();
		
		return redirect('question/select');
	}

	public function changeQuestonStatus()
	{
		$user = User::find(Auth::user()->id);
		$user->question_status = 1;
		$user->save();
	}

	public function getPlayError()
	{
		return view('pages.play_error');
	}

	public function getPlay($id)
	{
	
		$player_id = $id;

		$player_questions_answerd_by_auth_user = PlayedQuestions::where([
													['owner_id', $player_id],
													['player_id', Auth::user()->id]
												])->get();

		$number_of_played_questions = $player_questions_answerd_by_auth_user->count();


		if ($number_of_played_questions == 15) 
		{
			return redirect('score/' . $id );
		}


		$get_player_questions = UserQuestion::where('user_id', $id)->get();
		$player_questions_id = array_pluck($get_player_questions, 'question_id');
		$get_questions_to_play = Question::find($player_questions_id)->random();
	

		$question = $get_questions_to_play;

		$played_questions_with_user = PlayedQuestions::where([
												['player_id', Auth::user()->id],
												['owner_id', $id]
											])->get();

		$questions 	= $played_questions_with_user;
		$score  	= array_pluck($questions, 'status');
		$score 		= array_sum($score);

		
		$display_data = [];

		$display_data_array = [
			
			1 => [
				"image" 	=> "burnt_beans"
			],

			2 => [
				"image" => "fufu"
			],

			3 => [
				"image" => "spoilt_bannna"
			],

			4 => [
				"image" => "spoilt_bannna"
			],

			5 => [
				"image" => "spoilt_bannna"
			],

			6 => [
				"image" => "spoilt_bannna"
			],

			7 => [
				"image" => "my_nice"
			],

			8 => [
				"image" => "my_nice"
			],

			9 => [
				"image" => "my_nice"
			],

			10 => [
				"image" => "my_noreos"
			],

			11 => [
				"image" => "my_noreos"
			],

			12 => [
				"image" => "my_noreos"
			],

			13 => [
				"image" => "my_shortbreadd"
			],

			14 => [
				"image" => "my_shortbreadd"
			],

			15 => [
				"image" => "my_shortbreadd"
			]
		
		];	

		switch($score)
		{
		    case 1:
		        $display_data = $display_data_array['1'];
		        break;
		    case 2:
		        $display_data = $display_data_array['2'];
		        break;
		    case 3:
		        $display_data = $display_data_array['3'];
		        break;
		    case 4:
		        $display_data = $display_data_array['4'];
		        break;
		    case 5:
		        $display_data = $display_data_array['5'];
		        break;
		    case 6:
		        $display_data = $display_data_array['6'];
		        break;
		    case 7:
		        $display_data = $display_data_array['7'];
		        break;
		    case 8:
		        $display_data = $display_data_array['8'];
		        break;
		    case 9:
		        $display_data = $display_data_array['9'];
		        break;
		    case 10:
		        $display_data = $display_data_array['10'];
		        break;
		    case 11:
		        $display_data = $display_data_array['11'];
		        break;
		    case 12:
		        $display_data = $display_data_array['12'];
		        break;
		    case 13:
		        $display_data = $display_data_array['13'];
		        break;
		    case 14:
		        $display_data = $display_data_array['14'];
		        break;
		    case 15:
		        $display_data = $display_data_array['15'];
		        break;
		    default:
		        echo "No information available for that day.";
		        break;
		}
		
		return view('pages.play', compact('question', 'player_id', 'number_of_played_questions', 'display_data'));
	}

	public function postPlay(Request $request)
	{
		$status = 0;

		$question_answer = UserQuestion::where([
							['user_id', $request['player_id']],
							['question_id', $request['question_id']]
						])->get()->first();


		if ($question_answer->answer == $request['answer']) 
		{
			$status = 1;
		}

		$played = [
			"answer" 		=> $request['answer'],
			"owner_id" 		=> (int) $request['player_id'],
			"player_id" 	=> Auth::user()->id,
			"question_id" 	=> (int) $request['question_id'],
			"status"		=> $status,
		];

		PlayedQuestions::create($played);
		
		return back();
	}

	public function getUploadFile(Request $request)
	{
		$file = public_path('file/file.csv');
		
		\Excel::load($file, function($reader) {
			
			// Loop through all sheets
			$reader->each(function($sheet) {
				
				$data = [
					"point" 	=> rand(0, 10),
					"question" 	=> trim($sheet->question),
					"option_1" 	=> trim($sheet->option_1),
					"option_2" 	=> trim($sheet->option_2),
				];

				Question::create($data);
			});

		})->get();

		return redirect('/');
	}

	public function getScore($id)
	{
		$played_questions_with_user = PlayedQuestions::where([
												['player_id', Auth::user()->id],
												['owner_id', $id]
											])->get();

		$questions 	= $played_questions_with_user;
		$score  	= array_pluck($questions, 'status');
		$score 		= array_sum($score);
		
		return view('pages.score_page', compact('questions', 'score'));
	}

}
