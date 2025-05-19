<?php

use App\Models\Faq;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class FaqTableSeeder extends Seeder
{
    public function run()
    {
        if (! \App::environment(['production'])) {
            Model::unguard();

            Faq::factory()->count(10)->create();

            Model::reguard();
        }
    }
}