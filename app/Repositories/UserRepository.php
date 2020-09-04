<?php


namespace App\Repositories;

use App\User;
use SocialiteProviders\Manager\OAuth2\User as UserOauth;


class UserRepository
{
    public function getUserBySocId(UserOauth $user, string $socName) {

        $userInSystem = User::query()
            ->where('id_in_soc', $user->id)
            ->where('type_auth', $socName)
            ->first();
        if (is_null($userInSystem)) {
            $userInSystem = new User();
            $userInSystem->fill([
                'name' => !empty($user->getName()) ? $user->getName() : '',
                'email' => !empty($user->getEmail()) ? $user->getEmail() : '',
                'password' => '',
                'id_in_soc' => !empty($user->getId()) ? $user->getId() : '',
                'type_auth' => $socName,
                'avatar' => !empty($user->getAvatar()) ? $user->getAvatar() : '',

            ])->save();
        }

        return $userInSystem;
    }
}