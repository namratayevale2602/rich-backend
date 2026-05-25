<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    public function run(): void
    {
        $banners = [
            [
                'title'              => "Nashik's Most Trusted Software & Digital Marketing Company Since 2009",
                'subtitle'           => "When a small Nashik-based retail business decided to go digital in 2019, they needed more than just a website. They needed a partner who understood their budget, their customers, and the way business works in Maharashtra. They found Rich System Solutions — and within eight months, their online enquiries had tripled. That story repeats itself across 3,000+ clients we have served since 2009.",
                'desktop_image'      => null,
                'mobile_image'       => null,
                'mobile_image_400'   => null,
                'mobile_image_760'   => null,
                'mobile_image_1080'  => null,
                'cta_text'           => 'Explore Our Services',
                'cta_link'           => '/software-it-services',
                'cta_secondary_text' => 'Get Free Consultation',
                'cta_secondary_link' => '/contactus',
                'order'              => 1,
                'is_active'          => true,
            ],
            [
                'title'              => 'End-to-End Digital Services Under One Roof',
                'subtitle'           => 'We build, market, and automate your entire digital presence — from the first line of code to the last mile of customer communication. Custom software, WhatsApp Business API, bulk SMS, SEO, PPC, and graphic design — all from one trusted partner in Nashik.',
                'desktop_image'      => null,
                'mobile_image'       => null,
                'mobile_image_400'   => null,
                'mobile_image_760'   => null,
                'mobile_image_1080'  => null,
                'cta_text'           => 'Digital Marketing Services',
                'cta_link'           => '/digital-marketing-services',
                'cta_secondary_text' => 'Software & IT Solutions',
                'cta_secondary_link' => '/software-it-services',
                'order'              => 2,
                'is_active'          => true,
            ],
            [
                'title'              => "Nashik's Digital Growth Partner — Here When You Need Us",
                'subtitle'           => "Unlike national agencies that treat you like a ticket number, Rich System Solutions operates out of Nashik. Our office is at Tilakwadi. You can walk in, sit down, and talk through your requirements face to face. Our team speaks your language — Marathi, Hindi, and English. Monday to Saturday, 9:30 AM to 6:30 PM, our support line is open.",
                'desktop_image'      => null,
                'mobile_image'       => null,
                'mobile_image_400'   => null,
                'mobile_image_760'   => null,
                'mobile_image_1080'  => null,
                'cta_text'           => 'Talk to Us',
                'cta_link'           => '/contactus',
                'cta_secondary_text' => 'About Rich System Solutions',
                'cta_secondary_link' => '/about',
                'order'              => 3,
                'is_active'          => true,
            ],
        ];

        foreach ($banners as $data) {
            Banner::updateOrCreate(['order' => $data['order']], $data);
        }

        $this->command->info('BannerSeeder: seeded ' . count($banners) . ' banners.');
    }
}
