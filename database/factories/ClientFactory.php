<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->name();
        return [
            'name' => $name,
            'email' => fake()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('client'),
            'remember_token' => Str::random(10),
            'url' => Str::kebab($name),
        ];
    }
}
