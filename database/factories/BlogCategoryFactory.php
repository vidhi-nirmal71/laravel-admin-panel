<?php

namespace Database\Factories;

use App\Models\BlogCategory;
use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogCategoryFactory extends Factory
{
    protected $model = BlogCategory::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true),
            'status' => $this->faker->boolean,
            'created_by' => (new UserFactory())->active()->create()->id,
        ];
    }
}
