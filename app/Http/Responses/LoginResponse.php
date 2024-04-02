<?php

namespace App\Http\Responses;

use Filament\Http\Responses\Auth\Contracts\LoginResponse as FilamentLoginResponse;
use Illuminate\Http\RedirectResponse;

class LoginResponse implements FilamentLoginResponse
{
    public function toResponse($request): RedirectResponse
    {
        return redirect()->to('/');
    }
}
