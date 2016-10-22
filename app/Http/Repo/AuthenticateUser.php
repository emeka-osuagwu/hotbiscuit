<?php

namespace App\Http\Repo;

use Illuminate\Contracts\Auth\Guard;
use Laravel\Socialite\Contracts\Factory as Socialite;

class AuthenticateUser
{
	private 
	$auth,
	$socialite;

	public function __construct (Socialite $socialite, Guard $auth)
	{
		$this->auth 		= $auth;
		$this->socialite 	= $socialite;
	}

	public function execute ($hasCode, $provider, $listener)
	{
		if ( ! $hasCode ) 
		{
			return $this->getAuth($provider);
		}

		$user = $this->getSocialUser($provider);
		return $listener->userAuthenticated($user);
	}

	public function getAuth($provider)
	{
		return $this->socialite->driver($provider)->redirect();
	}
	
	public function getSocialUser ($provider)
	{
		return $this->socialite->driver($provider)->user();
	}
	
}