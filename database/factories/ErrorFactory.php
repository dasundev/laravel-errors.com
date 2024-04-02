<?php

namespace Database\Factories;

use App\Enums\ErrorStatus;
use App\Models\Error;
use Illuminate\Database\Eloquent\Factories\Factory;

class ErrorFactory extends Factory
{
    protected $model = Error::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->text(100),
            'solution' => $this->faker->text(500),
            'status' => ErrorStatus::Approved,
        ];
    }
}
