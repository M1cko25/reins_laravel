<?php

namespace App\Http\Controllers\Auth\Socialite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback(Request $request)
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::firstOrCreate(
            ['google_id' => $googleUser->getId()],
            ['name' => $googleUser->getName(), 'email' => $googleUser->getEmail(), 'email_verified_at' => now(), 'password' => bcrypt(str()->random(16))]
        );

        auth()->login($user);


        return redirect()->route('dashboard');
    }
}
