<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Services\OauthService;

class OauthController extends Controller
{
    public function fbLogin()
    {
        if (\Auth::id()) {
            return redirect()->route('index');
        }

        return Socialite::with('facebook')->redirect();

    }

    public function fbCallback(OauthService $service)
    {
        if (\Auth::id()) {
            return redirect()->route('index');
        }

        $user = Socialite::driver('facebook')->user();

        $authUser = $service->getUSerBySocialId($user, 'fb');

        \Auth::login($authUser);

        return redirect()->route('index');
    }
}
