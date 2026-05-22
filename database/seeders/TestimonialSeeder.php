<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            ['username' => 'Abhishek Mahale',  'quote' => 'Excellent service! The Bulk SMS platform is very user-friendly and the delivery rates are impressive. Great support team!', 'order' => 1, 'is_active' => true],
            ['username' => 'Namrata Yevale',   'quote' => 'Rich System Solution has transformed our customer communication. The API integration was seamless and the results are outstanding.', 'order' => 2, 'is_active' => true],
            ['username' => 'Pravin Bhoye',     'quote' => 'Best SMS service provider in India. Affordable pricing with excellent features. Highly recommended for businesses of all sizes.', 'order' => 3, 'is_active' => true],
        ];

        foreach ($testimonials as $data) {
            Testimonial::firstOrCreate(['username' => $data['username']], $data);
        }

        $this->command->info('TestimonialSeeder: seeded ' . count($testimonials) . ' testimonials.');
    }
}
