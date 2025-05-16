<?php

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use Database\Factories\BlogCategoryFactory;
use Database\Factories\BlogFactory;
use Database\Factories\BlogTagFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Database\Factories\UserFactory;

class BlogTableSeeder extends Seeder
{
    public function run()
    {
        if (! \App::environment(['production'])) {
            Model::unguard();

            $userFactory = new UserFactory();
            $user = $userFactory->active()->create(); // create once, reuse

            for ($i = 0; $i < 10; $i++) {
                // Create blog with direct factory
                $blog = (new BlogFactory())->create([
                    'created_by' => $user->id,
                ]);

                // Create category with same user
                $blogCategory = (new BlogCategoryFactory())->create([
                    'created_by' => $user->id,
                ]);

                // Attach category to blog
                $blog->categories()->sync([$blogCategory->id]);

                // Create tag with same user
                $blogTag = (new BlogTagFactory())->create([
                    'created_by' => $user->id,
                ]);

                // Attach tag to blog
                $blog->tags()->sync([$blogTag->id]);
            }

            Model::reguard();
        }
    }
}
