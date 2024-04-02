<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Filament\Facades\Filament;
use Laravel\Socialite\Facades\Socialite;

class GitHubController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::updateOrCreate(['email' => $githubUser->email], [
            'name' => $githubUser->name,
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);

        Filament::auth()->login($user);

        return redirect()->route('filament.app.pages.dashboard');
    }
}
