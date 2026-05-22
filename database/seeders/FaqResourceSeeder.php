<?php

namespace Database\Seeders;

use App\Models\FaqProduct;
use App\Models\ResourceFaq;
use Illuminate\Database\Seeder;

class FaqResourceSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['title' => 'Bulk SMS',          'order' => 1],
            ['title' => 'IVR System',         'order' => 2],
            ['title' => 'Digital Marketing',  'order' => 3],
            ['title' => 'WhatsApp Service',   'order' => 4],
            ['title' => 'Bulk Voice',         'order' => 5],
            ['title' => 'Web Development',    'order' => 6],
        ];

        foreach ($products as $data) {
            FaqProduct::updateOrCreate(
                ['title' => $data['title']],
                array_merge($data, ['is_active' => true])
            );
        }

        $faqs = [
            [
                'product' => 'Bulk SMS',
                'question' => 'What is Bulk SMS service?',
                'answer'   => 'Bulk SMS service allows you to send promotional or transactional messages to thousands of recipients simultaneously through our robust platform with high delivery rates.',
                'order'    => 1,
            ],
            [
                'product' => 'Bulk SMS',
                'question' => 'How much does Bulk SMS cost?',
                'answer'   => 'We offer competitive pricing starting at Rs. 12,000 for 100,000 SMS with various packages to suit different business needs and volumes.',
                'order'    => 2,
            ],
            [
                'product' => 'IVR System',
                'question' => 'What is an IVR System?',
                'answer'   => 'IVR (Interactive Voice Response) is an automated telephone system that interacts with callers, gathers information, and routes calls to the appropriate recipients without human intervention.',
                'order'    => 1,
            ],
            [
                'product' => 'IVR System',
                'question' => 'Can IVR system handle multiple languages?',
                'answer'   => 'Yes, our IVR system supports multiple languages and can be customized to provide voice prompts in regional languages based on your customer demographics.',
                'order'    => 2,
            ],
            [
                'product' => 'Digital Marketing',
                'question' => 'What digital marketing services do you offer?',
                'answer'   => 'We offer comprehensive digital marketing services including SEO, SEM, social media marketing, content marketing, email marketing, and analytics to help you grow your online presence.',
                'order'    => 1,
            ],
            [
                'product' => 'WhatsApp Service',
                'question' => 'What is WhatsApp Business API?',
                'answer'   => 'WhatsApp Business API is an official solution for businesses to communicate with customers at scale, send notifications, and provide customer support through the WhatsApp platform.',
                'order'    => 1,
            ],
        ];

        foreach ($faqs as $data) {
            $product = FaqProduct::where('title', $data['product'])->first();
            if (!$product) continue;

            ResourceFaq::updateOrCreate(
                ['faq_product_id' => $product->id, 'question' => $data['question']],
                [
                    'answer'    => $data['answer'],
                    'order'     => $data['order'],
                    'is_active' => true,
                ]
            );
        }
    }
}
