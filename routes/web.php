<?php

use App\Http\Controllers\Auth\GitHubController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Volt::route('/', 'welcome');
Volt::route('/errors/{error}', 'errors.index')->name('errors.index');

Route::get('/auth/redirect', [GitHubController::class, 'redirect'])->name('auth.redirect');
Route::get('/auth/callback', [GitHubController::class, 'callback'])->name('auth.callback');
