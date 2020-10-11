<?php

namespace App\Http\Controllers;

use App\BindingAccount;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function loginVK()
    {
        if (Auth::check()) {
            return redirect()->route('Home');
        }
        return Socialite::with('vkontakte')->redirect();
    }

    public function loginGitHub()
    {
        if (Auth::check()) {
            return redirect()->route('Home');
        }
        return Socialite::driver('github')->redirect();
    }

    public function bindAccounts($email)
    {

        $user = User::query()->where('email', $email)->first();
        $bindedAcc = new BindingAccount();
        $bindedAcc->fill([
            'user_id' => $user->id
        ])->save();
        Auth::login($user);
        return redirect()->route('Home')->with('success', 'Учетные записи успешно связаны!');
    }

    public function response($social, UserRepository $userRepository)
    {
        switch ($social) {
            case 'vk':
                $driver = 'vkontakte';
                break;
            case 'git':
                $driver = 'github';
                break;
        }
        if (Auth::check()) {
            return redirect()->route('Home');
        }
        $user = Socialite::driver($driver)->user();

        $authUser = User::query()->where('email', $user->getEmail())->first();
        if (!is_null($authUser)) {
            $id = $authUser->id;
            if (!is_null(BindingAccount::query()->where('user_id', $id)->first())) {
                Auth::login($authUser);
                return redirect()->route('Home');
            }
        }

        if ($userRepository->hasSameEmail($user, $social)) {
            return view('auth.binding')->with('user', $user);
        }
        $userInSystem = $userRepository->getUserBySocId($user, $social);
        Auth::login($userInSystem);
        return redirect()->route('Home');
    }
}
