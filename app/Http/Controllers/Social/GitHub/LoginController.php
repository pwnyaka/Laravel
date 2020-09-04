<?php

namespace App\Http\Controllers\Social\GitHub;

use App\Repositories\UserRepository;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function login()
    {
        return Socialite::driver('github')->redirect();
    }

    public function response(UserRepository $userRepository)
    {
        $user = Socialite::driver('github')->user();
        if (Auth::id()) {
            return redirect()->route('Home');
        }
        $user = Socialite::driver('github')->user();
        $userInSystem = $userRepository->getUserBySocId($user, 'github');
        Auth::login($userInSystem);


        return redirect()->route('Home');
    }
}
