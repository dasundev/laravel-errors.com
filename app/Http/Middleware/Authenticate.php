<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Http\Middleware\Authenticate as FilamentAuthenticate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate extends FilamentAuthenticate
{
    protected function redirectTo($request): ?string
    {
        return '/';
    }
}
