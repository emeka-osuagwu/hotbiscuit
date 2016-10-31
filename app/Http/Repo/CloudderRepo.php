<?php

namespace App\Http\Repo;

use Cloudder;
use Illuminate\Support\Facades\Input as Input;

class CloudderRepo
{
	public function getImageUrl()
	{
		$image = Input::get('image');
		Cloudder::upload($image, null);
		return $imgUrl = Cloudder::getResult()['url'];
	}

	public function getLogoUrl()
	{
		$image = Input::file('logo');
		Cloudder::upload($image, null);
		return $imgUrl = Cloudder::getResult()['url'];
	}
}