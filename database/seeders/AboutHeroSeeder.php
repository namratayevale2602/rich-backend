<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutHero;

class AboutHeroSeeder extends Seeder
{
    public function run(): void
    {
        AboutHero::create([
            'heading'     => 'One-on-one engagement, for everyone',
            'subtitle'    => 'Revolutionizing commerce, marketing, and support with conversational messaging worldwide',
            'description' => 'Rich System Solutions Pvt Ltd, established in 2009, is a leading digital marketing company in Nashik. We help brands achieve their business goals through comprehensive services like web design, development, social media marketing, paid marketing, and more. Our experienced team works closely with you, understanding your needs and delivering results that drive growth and success',
            'image'       => null,
            'is_active'   => true,
        ]);
    }
}
