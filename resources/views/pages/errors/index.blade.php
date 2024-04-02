<?php

use function Livewire\Volt\{state, mount};
use App\Models\Error;

state(['error']);

mount(function (Error $error) {
    $this->error = $error;
});

?>

<div>
    <section class="max-w-4xl mx-auto px-5 lg:px-0 pt-5">
        {{ $error->solution }}
    </section>
</div>
