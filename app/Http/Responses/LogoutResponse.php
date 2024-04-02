<?php

namespace App\Http\Responses;

use Filament\Facades\Filament;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse as FilamentLogoutResponse;
use Illuminate\Http\RedirectResponse;

class LogoutResponse implements FilamentLogoutResponse
{
    public function toResponse($request): RedirectResponse
    {
        Filament::auth()->logout();

        return redirect()->to('/');
    }
}
