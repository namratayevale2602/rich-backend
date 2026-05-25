<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    public function run(): void
    {
        $title = 'End-to-End Digital Services Under One Roof';

        HeroSection::updateOrCreate(
            ['title' => $title],
            [
                'title'              => $title,
                'subtitle'           => "Most companies have to juggle five different vendors — one for their website, another for SEO, a third for bulk SMS, and so on. Every vendor has a different billing cycle, a different point of contact, and a different excuse when things don't work together. Rich System Solutions solves that problem completely. We build, market, and automate your entire digital presence — from the first line of code to the last mile of customer communication.",
                'hero_image'         => null,
                'hero_image_400'     => null,
                'hero_image_500'     => null,
                'hero_image_600'     => null,
                'hero_image_700'     => null,
                'hero_image_800'     => null,
                'hero_image_1000'    => null,
                'hero_image_1500'    => null,
                'cta_text'           => 'Explore Our Services',
                'cta_link'           => '/software-it-services',
                'cta_secondary_text' => 'Get Free Consultation',
                'cta_secondary_link' => '/contactus',
                'stats'              => [
                    ['icon' => 'TrendingUp', 'value' => '16+',    'label' => 'Years of Experience'],
                    ['icon' => 'Users',      'value' => '3,000+', 'label' => 'Satisfied Clients'],
                    ['icon' => 'Star',       'value' => '1,000+', 'label' => 'Projects Delivered'],
                    ['icon' => 'Shield',     'value' => '99%',    'label' => 'SMS Delivery Rate'],
                ],
                'is_active'          => true,
            ]
        );

        // Deactivate any older hero records with a different title
        HeroSection::where('title', '!=', $title)->update(['is_active' => false]);

        $this->command->info('HeroSectionSeeder: seeded hero section.');
    }
}
