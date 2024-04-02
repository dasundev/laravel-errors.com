<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class GitHubController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {
        try {
            $githubUser = Socialite::driver('github')->user();

            $user = User::updateOrCreate(
                [
                    'email' => $githubUser->email
                ],
                [
                    'github_username' => $githubUser->getNickname(),
                    'name' => $githubUser->name,
                    'github_token' => $githubUser->token,
                    'github_refresh_token' => $githubUser->refreshToken,
                ]
            );

            Auth::login($user);

            return redirect()->route('filament.app.pages.dashboard');
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        return back();
    }
}
