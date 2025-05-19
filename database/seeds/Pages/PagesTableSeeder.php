<?php

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Database\Factories\UserFactory;
class PagesTableSeeder extends Seeder
{
    public function run()
    {
        if (! \App::environment(['production'])) {
            Model::unguard();

            $user = (new UserFactory())->active()->create();

            Page::factory()
                ->count(10)
                ->create([
                    'created_by' => $user->id,
                ]);

            Model::reguard();
        }
    }
}