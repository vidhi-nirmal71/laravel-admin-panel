<?php

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Database\Factories\UserFactory; // ✅ Explicit factory import

class PagesTableSeeder extends Seeder
{
    public function run()
    {
        if (! \App::environment(['production'])) {
            Model::unguard();

            $user = (new UserFactory())->active()->create(); // ✅ Explicit factory usage

            Page::factory()
                ->count(10)
                ->create([
                    'created_by' => $user->id,
                ]);

            Model::reguard();
        }
    }
}
