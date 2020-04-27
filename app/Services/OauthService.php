<?php

namespace App\Services;

use App\User;
use Laravel\Socialite\Contracts\User as OauthUser;

/**
 * Class OauthService
 * @package App\Services
 */

class OauthService
{
    /**
     * @param OauthUser $user
     * @param string $socialNetworkName
     * @return User|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object
     */
    public function getUSerBySocialId(OauthUser $user, string $socialNetworkName)
    {
        $registeredUser = User::query()->where([
            'social_network_id' => $user->id,
            'auth_type' => $socialNetworkName
        ])->first();

        if (empty($registeredUser)) {
            $registeredUser = new User();
            $registeredUser->fill([
                'name' => !empty($user->getName()) ? $user->getName() : '',
                'email' => !empty($user->getEmail()) ? $user->getEmail() : '',
                'password' => '',
                'social_network_id' => !empty($user->getId()) ? $user->getId() : '',
                'auth_type' => $socialNetworkName,
                'profile_pic' => !empty($user->getAvatar()) ? $user->getAvatar() : '',
            ]);
            $registeredUser->save();
        }
        return $registeredUser;
    }

}
