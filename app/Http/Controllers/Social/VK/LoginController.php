<?php

namespace App\Http\Controllers\Social\VK;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Auth;

class LoginController extends Controller
{
    public function login()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function response(UserRepository $userRepository)
    {
        if (Auth::id()) {
            return redirect()->route('Home');
        }
        $user = Socialite::driver('vkontakte')->user();
        $userInSystem = $userRepository->getUserBySocId($user, 'vk');
        Auth::login($userInSystem);


        return redirect()->route('Home');
    }
}
