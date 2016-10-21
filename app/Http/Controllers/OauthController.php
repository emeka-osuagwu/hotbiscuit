<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Checker\Checker;
use App\Http\Repo\AuthenticateUser;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

class OauthController extends Controller
{
    private 
    $auth,
    $oauth_data;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function getSocialLogin(AuthenticateUser $authenticate, Request $request, $provider )
    {
        return $authenticate->execute( $request->has('code') || $request->has('oauth_token'), $provider, $this);
    }
    
    public function checkOauthUserExist($oauth_id)
    {
        return User::where('oauth', $oauth_id)->get();
    }

    public function userAuthenticated($user)
    {
        $check_oauth_user_exist = $this->checkOauthUserExist($user->user['id']);

        if ($check_oauth_user_exist->count() > 0) 
        {
            $this->auth_user($user);
            return redirect('/');
        }
        else
        {
            $authUser               = new User;
            $authUser->username     = ($user->name) ? $user->name : $user->nickname;
            $authUser->email        = ($user->email)? $user->email: "";
            $authUser->oauth        = $user->id;
            $authUser->avatar       = $user->avatar;
            $authUser->save();
            $this->auth_user($user);
            return redirect('welcome');
        }
    }

    public function auth_user($oauth_user)
    {
        Auth::attempt(['email' => $oauth_user->email, 'password' => $oauth_user->id]);
    }

    // public function auth_user(Request $oauth_user)
    // {
    //     Auth::attempt(['email' => $oauth_user['email'], 'password' => $oauth_user['id']]);
    //     return redirect('user');
    //     // http://connect.dev/magic_login?email=fagemaki.iniruto@yahoo.com&id=1075950732481300
    // }

}



// <?php

// namespace App\Http\Controllers;

// use Auth;
// use App\User;
// use App\Http\Requests;
// use Illuminate\Http\Request;
// use App\Http\Checker\Checker;
// use App\Http\Repo\AuthenticateUser;
// use App\Http\Controllers\Controller;
// use Illuminate\Contracts\Auth\Guard;

// class OauthController extends Controller
// {
//     private 
//     $auth,
//     $oauth_data;

//     public function __construct(Guard $auth)
//     {
//         $this->auth = $auth;
//     }

//     public function getSocialLogin(AuthenticateUser $authenticate, Request $request, $provider )
//     {
//         return $authenticate->execute( $request->has('code') || $request->has('oauth_token'), $provider, $this);
//     }
    
//     public function checkOauthUserExist($oauth_id)
//     {
//         return User::where('oauth', $oauth_id)->get();
//     }

//     public function userAuthenticated($user)
//     {
//         $oauth_id = ($user->id) ? $user->id : $user->user['id'];

//         $check_oauth_user_exist = $this->checkOauthUserExist($oauth_id);

//         if ($check_oauth_user_exist->count() > 0) 
//         {
//             $this->auth_user($user);
//             return redirect('/');
//         }
//         else
//         {
//             $authUser               = new User;
//             $authUser->username     = ($user->name) ? $user->name : $user->nickname;
//             $authUser->email        = ($user->email)? $user->email: "";
//             $authUser->password     = $user->id;
//             $authUser->oauth        = $user->id;
//             $authUser->avatar       = $user->avatar_original;
//             $authUser->save();
//             $this->auth_user($user);
//             return redirect('welcome');
//         }
//     }

//     public function auth_user($oauth_user)
//     {
//         $id = ($oauth_user->id) ? $oauth_user->id : $oauth_user->user->id ;
//         Auth::loginUsingId($id, true);
//         return back();
//     }

//}