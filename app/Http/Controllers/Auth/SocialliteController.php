<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialliteController extends Controller
{
    public function google_redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function google_callback()
    {
       $user = Socialite::driver('google')->user();
        // Login atau registrasi user
        $existingUser = \App\Models\User::where('email', $user->getEmail())->first();
        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            $username = str()->random(5);
            $newUser = User::create([
                'username' => $username,
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'google_id' => $user->getId(),
                'password' => bcrypt(str()->random(10)),
            ]);
            $newUser->assignRole('user');
            Auth::login($newUser);
        }
        return redirect('/profile');
    }

    public function facebook_redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebook_callback()
    {
        $user = Socialite::driver('facebook')->user();
        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            // Login jika user sudah ada
            Auth::login($existingUser);
        } else {
            $username = str()->random(5);
            $newUser = User::create([
                'username' => $username,
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'google_id' => $user->getId(),
                'password' => bcrypt(str()->random(10)), // Password default
            ]);
            $newUser->assignRole('user');
            Auth::login($newUser);
        }
        return redirect('/profile');
    }


}
