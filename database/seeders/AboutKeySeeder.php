<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutKey;

class AboutKeySeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'type'        => 'About',
                'title'       => 'Who We Are',
                'subtitle'    => 'Our Story',
                'description' => 'Founded with a vision to revolutionize the industry, we have grown from a small startup to a trusted partner for businesses worldwide. Our journey is marked by innovation, quality, and customer satisfaction.',
                'image'       => null,
                'order'       => 1,
                'is_active'   => true,
            ],
            [
                'type'        => 'Vision',
                'title'       => 'Our Vision',
                'subtitle'    => null,
                'description' => 'To be the global leader in our field, setting new standards of excellence and innovation while creating sustainable value for our stakeholders and communities we serve.',
                'image'       => null,
                'order'       => 2,
                'is_active'   => true,
            ],
            [
                'type'        => 'Mission',
                'title'       => 'Our Mission',
                'subtitle'    => null,
                'description' => 'To deliver exceptional products and services that exceed customer expectations through continuous innovation, operational excellence, and a commitment to quality that never compromises.',
                'image'       => null,
                'order'       => 3,
                'is_active'   => true,
            ],
            [
                'type'        => 'Offer',
                'title'       => 'What We Do',
                'subtitle'    => 'Our Services',
                'description' => 'We offer a comprehensive range of services including consulting, development, and support. Our solutions are tailored to meet the unique needs of each client, ensuring optimal results and maximum value.',
                'image'       => null,
                'order'       => 4,
                'is_active'   => true,
            ],
        ];

        foreach ($items as $item) {
            AboutKey::create($item);
        }
    }
}
