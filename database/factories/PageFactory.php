<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Page;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    protected $model = Page::class;

    public function definition()
    {
        return [
            'title' => $this->faker->words(4, true),
            'page_slug' => $this->faker->slug,
            'description' => $this->faker->paragraph,
            'cannonical_link' => $this->faker->url,
            'seo_title' => $this->faker->word,
            'seo_keyword' => $this->faker->word,
            'seo_description' => $this->faker->paragraph,
            'status' => $this->faker->boolean,
            // 'created_by' will be set in seeder
        ];
    }
}
