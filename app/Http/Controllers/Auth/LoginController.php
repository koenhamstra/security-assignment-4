<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {
        $githubUser = Socialite::driver('github')->user();

        //Create a new user in our database
        $user = User::where('provider_id', $githubUser->getId())->first();

        if (! $user) {
            $user = User::create([
                'email' => $githubUser->getEmail(),
                'name' => $githubUser->getNickname(),
                'provider_id' => $githubUser->getId(),
            ]);
        }

        // ALTERNATIVE WAY
//        $user = User::firstOrCreate(
//            [
//                'provider_id' => $githubUser->getId()
//            ],
//            [
//                'email' => $githubUser->getEmail(),
//                'name' => $githubUser->getNickname(),
//            ]
//        );

        // Log the user in
        auth()->login($user, true);

        //redirect to home
        return redirect('/');
    }
}
