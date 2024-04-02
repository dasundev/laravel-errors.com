<?php

use function Livewire\Volt\{state, mount, title};
use App\Models\Error;

state(['error']);

title(fn () => $this->error->title);

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
    <div class="prose prose-amber max-w-5xl mx-auto py-10">
        @markdown($error->solution)
    </div>
</div>
