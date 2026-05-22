<?php

namespace Database\Seeders;

use App\Models\HowToGuideIntro;
use App\Models\HowToGuideMagazine;
use App\Models\HowToGuideSample;
use Illuminate\Database\Seeder;

class HowToGuideSeeder extends Seeder
{
    public function run(): void
    {
        HowToGuideIntro::updateOrCreate(
            ['id' => 1],
            [
                'introduction' => 'Explore our comprehensive collection of resources designed to help your business grow. From detailed guides to industry-specific templates, we provide everything you need to succeed in your digital marketing efforts.',
                'is_active'    => true,
            ]
        );

        $magazines = [
            [
                'title'       => 'Digital Marketing Guide 2024',
                'subtitle'    => 'Complete Guide to Digital Success',
                'description' => 'A comprehensive guide covering all aspects of digital marketing including SEO, social media, email marketing, and more. Perfect for businesses looking to enhance their online presence.',
                'document'    => null,
                'image'       => null,
                'order'       => 1,
            ],
            [
                'title'       => 'Bulk SMS Marketing Handbook',
                'subtitle'    => 'Master SMS Marketing Strategies',
                'description' => 'Learn how to effectively use bulk SMS for your marketing campaigns. This guide covers best practices, compliance guidelines, and successful case studies.',
                'document'    => null,
                'image'       => null,
                'order'       => 2,
            ],
        ];

        foreach ($magazines as $data) {
            HowToGuideMagazine::updateOrCreate(
                ['title' => $data['title']],
                array_merge($data, ['is_active' => true])
            );
        }

        $samples = [
            [
                'title'       => 'Promotional SMS Templates',
                'description' => 'Enhance your marketing campaigns with our curated Promotional SMS templates. Designed for maximum impact, these templates help you craft engaging messages for product launches, sales, and exclusive offers.',
                'document'    => null,
                'order'       => 1,
            ],
            [
                'title'       => 'Transactional SMS Templates',
                'description' => 'Simplify your transactional communications with our ready-to-use Transactional SMS templates. Whether for order confirmations, payment alerts, account updates, or appointment reminders.',
                'document'    => null,
                'order'       => 2,
            ],
            [
                'title'       => 'OTP SMS Templates',
                'description' => 'Secure your user interactions with our ready-to-use OTP SMS templates. Designed for delivering One-Time Passwords securely and efficiently for user authentication.',
                'document'    => null,
                'order'       => 3,
            ],
        ];

        foreach ($samples as $data) {
            HowToGuideSample::updateOrCreate(
                ['title' => $data['title']],
                array_merge($data, ['is_active' => true])
            );
        }
    }
}
