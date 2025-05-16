<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    protected $model = Blog::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true),
            'slug' => $this->faker->slug,
            'content' => $this->faker->paragraph,
            'publish_datetime' => $this->faker->dateTime,
            'meta_title' => $this->faker->words(3, true),
            'cannonical_link' => $this->faker->url,
            'meta_keywords' => $this->faker->word,
            'meta_description' => $this->faker->paragraph,
            'status' => $this->faker->numberBetween(0, 3),
            'created_by' => (new UserFactory())->active()->create()->id,
        ];
    }
}

