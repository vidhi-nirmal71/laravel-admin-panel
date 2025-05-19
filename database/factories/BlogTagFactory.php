<?php

namespace Database\Factories;

use App\Models\BlogTag;
use App\Models\Auth\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogTagFactory extends Factory
{
    protected $model = BlogTag::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,
            'status' => $this->faker->boolean,
            'created_by' => (new UserFactory())->active()->create()->id,
        ];
    }
}