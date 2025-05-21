<?php

namespace Database\Factories;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('1234'),
            'password_changed_at' => null,
            'remember_token' => Str::random(10),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'active' => true,
            'status' => true,
            'confirmed' => true,
        ];
    }

    public function active()
    {
        return $this->state(fn (array $attributes) => ['status' => true]);
    }

    public function inactive()
    {
        return $this->state(fn (array $attributes) => ['status' => false]);
    }
}