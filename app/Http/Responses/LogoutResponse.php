<?php

namespace App\Http\Responses;

use Filament\Facades\Filament;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse as BaseLogoutResponse;
use Illuminate\Http\RedirectResponse;

class LogoutResponse implements BaseLogoutResponse
{
    public function toResponse($request): RedirectResponse
    {
        Filament::auth()->logout();

        return redirect()->to('/');
    }
}
