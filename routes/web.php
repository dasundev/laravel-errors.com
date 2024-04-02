<?php

use Livewire\Volt\Volt;

Volt::route('/', 'welcome');
Volt::route('/errors/{error}', 'errors.index')->name('errors.index');
