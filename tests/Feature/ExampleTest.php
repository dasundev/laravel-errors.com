<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

uses(DatabaseMigrations::class);

it('returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
