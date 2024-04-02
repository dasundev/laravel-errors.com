<?php

use function Livewire\Volt\{state, mount};
use App\Models\Error;

state(['error']);

mount(function (Error $error) {
    $this->error = $error;
});

?>

<div>
    <div class="mx-auto bg-amber-400">
        <div class="max-w-5xl mx-auto py-10 ">
            <x-error :$error class="bg-amber-200 hover:bg-amber-200" />
        </div>
    </div>
    <div class="max-w-5xl mx-auto py-10">
        <div>{{ $error->solution }}</div>
    </div>
</div>
