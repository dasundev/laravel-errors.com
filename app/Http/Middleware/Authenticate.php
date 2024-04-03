<?php

namespace App\Http\Middleware;

use Filament\Http\Middleware\Authenticate as FilamentAuthenticate;

class Authenticate extends FilamentAuthenticate
{
    protected function redirectTo($request): ?string
    {
        return '/';
    }
}
