<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutUsSection;

class AboutUsSectionSeeder extends Seeder
{
    public function run(): void
    {
        AboutUsSection::create([
            'label' => 'About Us',
            'title' => 'The Journey Of Rich System Solution',
            'paragraphs' => [
                ['text' => 'At Rich System Solution, we are Nashik\'s leading digital marketing agency, transforming businesses since 2009 with impactful strategies that drive growth.'],
                ['text' => 'Having partnered with over 400 brands, we specialize in a full suite of services, including content creation, web design, social media management, Google Ads, programmatic marketing, and email marketing.'],
                ['text' => 'Our unique blend of stability and flexibility allows us to cater to startups and established brands alike. With transparent reporting, direct access to our core team, and secure data handling, we\'re the trusted partner for businesses seeking measurable results and lasting success in the digital world.'],
            ],
            'image'     => null,
            'is_active' => true,
        ]);
    }
}
