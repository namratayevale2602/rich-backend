<?php

namespace Database\Seeders;

use App\Models\ServiceWeOffer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ServiceWeOfferSeeder extends Seeder
{
    public function run(): void
    {
        $src  = base_path('../richsol/public/homeimg');
        $main = public_path('uploads/services-we-offer');
        $resp = public_path('uploads/services-we-offer/responsive');
        File::ensureDirectoryExists($main);
        File::ensureDirectoryExists($resp);

        $files = [
            'softwareitservice.webp'      => $main . '/softwareitservice.webp',
            'softwareitservice-400.webp'  => $resp . '/softwareitservice-400.webp',
            'softwareitservice-700.webp'  => $resp . '/softwareitservice-700.webp',
            'socialmediamark.webp'        => $main . '/socialmediamark.webp',
            'socialmediamark-400.webp'    => $resp . '/socialmediamark-400.webp',
            'socialmediamark-700.webp'    => $resp . '/socialmediamark-700.webp',
            'seo.webp'                    => $main . '/seo.webp',
            'seo-400.webp'                => $resp . '/seo-400.webp',
            'seo-700.webp'                => $resp . '/seo-700.webp',
            'designanddevelopmemt.webp'   => $main . '/designanddevelopmemt.webp',
            'designanddevelopmemt-400.webp' => $resp . '/designanddevelopmemt-400.webp',
            'designanddevelopmemt-700.webp' => $resp . '/designanddevelopmemt-700.webp',
            'contentmarketing.webp'       => $main . '/contentmarketing.webp',
            'contentmarketing-400.webp'   => $resp . '/contentmarketing-400.webp',
            'contentmarketing-700.webp'   => $resp . '/contentmarketing-700.webp',
            'performancemarketing.webp'   => $main . '/performancemarketing.webp',
            'performancemarketing-400.webp' => $resp . '/performancemarketing-400.webp',
            'performancemarketing-700.webp' => $resp . '/performancemarketing-700.webp',
        ];
        foreach ($files as $f => $d) {
            $s = $src . DIRECTORY_SEPARATOR . $f;
            if (File::exists($s) && !File::exists($d)) File::copy($s, $d);
        }

        $services = [
            [
                'number' => '01', 'title' => 'SOFTWARE & IT SERVICES',
                'description' => 'Behind every growing business is software that works reliably. Rich System Solutions has delivered over 1,000 custom projects since 2009 — software that manages inventory, tracks customers, and connects every department without friction.',
                'image' => 'services-we-offer/softwareitservice.webp',
                'image_400' => 'services-we-offer/responsive/softwareitservice-400.webp',
                'image_700' => 'services-we-offer/responsive/softwareitservice-700.webp',
                'gradient' => 'from-blue-600 to-purple-700', 'icon' => 'Code',
                'features' => [
                    ['item' => 'Custom Software Development'],
                    ['item' => 'Modern Responsive Website Development'],
                    ['item' => 'Mobile Apps'],
                    ['item' => 'Courses and Internships'],
                    ['item' => 'WhatsApp API Integration'],
                    ['item' => 'Dynamic QR Code & Smart Link Generation'],
                ],
                'order' => 1, 'is_active' => true,
            ],
            [
                'number' => '02', 'title' => 'SOCIAL MEDIA MARKETING',
                'description' => 'Official Meta Verified WhatsApp Business API, DLT-compliant bulk SMS, WhatsApp chatbot automation, and social media marketing — all under one roof from a trusted Nashik partner.',
                'image' => 'services-we-offer/socialmediamark.webp',
                'image_400' => 'services-we-offer/responsive/socialmediamark-400.webp',
                'image_700' => 'services-we-offer/responsive/socialmediamark-700.webp',
                'gradient' => 'from-pink-500 to-rose-600', 'icon' => 'Megaphone',
                'features' => [
                    ['item' => 'Bulk SMS & Voice Call Services'],
                    ['item' => 'WhatsApp Marketing Suite'],
                    ['item' => 'WhatsApp Promotions'],
                    ['item' => 'Meta Verified WhatsApp Services'],
                    ['item' => 'WhatsApp Chatbot Solutions'],
                    ['item' => 'Personal Number WhatsApp Service'],
                    ['item' => 'RICH Connect Application'],
                    ['item' => 'Lead Management & Automation via Masteraix.io'],
                    ['item' => 'Podcast, Reel Shoot & Product Photography'],
                ],
                'order' => 2, 'is_active' => true,
            ],
            [
                'number' => '03', 'title' => 'SEO SERVICES',
                'description' => 'We push Nashik businesses to Google Page 1. SEO campaigns covering on-page optimisation, technical SEO, local SEO, link building, and content strategy targeting real purchase intent.',
                'image' => 'services-we-offer/seo.webp',
                'image_400' => 'services-we-offer/responsive/seo-400.webp',
                'image_700' => 'services-we-offer/responsive/seo-700.webp',
                'gradient' => 'from-green-500 to-emerald-600', 'icon' => 'BarChart',
                'features' => [
                    ['item' => 'Local SEO'], ['item' => 'Link Building'],
                    ['item' => 'E-Commerce SEO'], ['item' => 'SEO Audit'],
                    ['item' => 'International SEO'], ['item' => 'Managed SEO Services'],
                ],
                'order' => 3, 'is_active' => true,
            ],
            [
                'number' => '04', 'title' => 'DESIGN & DEVELOPMENT',
                'description' => 'From responsive business websites to complex enterprise platforms — designed and built by our in-house team. Fast, secure, scalable, and SEO-ready from day one.',
                'image' => 'services-we-offer/designanddevelopmemt.webp',
                'image_400' => 'services-we-offer/responsive/designanddevelopmemt-400.webp',
                'image_700' => 'services-we-offer/responsive/designanddevelopmemt-700.webp',
                'gradient' => 'from-orange-500 to-red-600', 'icon' => 'PenTool',
                'features' => [
                    ['item' => 'Custom Web Development'], ['item' => 'UI/UX Design'],
                    ['item' => 'E-Commerce Development'], ['item' => 'Product Design'],
                    ['item' => 'Enterprise Solutions'], ['item' => 'Website Design'],
                ],
                'order' => 4, 'is_active' => true,
            ],
            [
                'number' => '05', 'title' => 'CONTENT MARKETING',
                'description' => 'Content that ranks, educates, and converts. Blog writing, website copy, video scripts, case studies, and email newsletters — all written with SEO best practices and purchase intent in mind.',
                'image' => 'services-we-offer/contentmarketing.webp',
                'image_400' => 'services-we-offer/responsive/contentmarketing-400.webp',
                'image_700' => 'services-we-offer/responsive/contentmarketing-700.webp',
                'gradient' => 'from-indigo-500 to-blue-600', 'icon' => 'Layers',
                'features' => [
                    ['item' => 'Strategy & Consulting'], ['item' => 'Content Creation'],
                    ['item' => 'Content Optimization'], ['item' => 'Content Promotion'],
                ],
                'order' => 5, 'is_active' => true,
            ],
            [
                'number' => '06', 'title' => 'PERFORMANCE MARKETING',
                'description' => 'Highly targeted Google Ads and Meta Ads campaigns optimised for cost-per-lead. Every rupee of your ad budget is tracked, measured, and optimised for maximum ROI — not just clicks.',
                'image' => 'services-we-offer/performancemarketing.webp',
                'image_400' => 'services-we-offer/responsive/performancemarketing-400.webp',
                'image_700' => 'services-we-offer/responsive/performancemarketing-700.webp',
                'gradient' => 'from-purple-500 to-indigo-600', 'icon' => 'Target',
                'features' => [
                    ['item' => 'PPC Advertising'], ['item' => 'Social Media Advertising'],
                    ['item' => 'Conversion Rate Optimization'], ['item' => 'Lead Generation'],
                    ['item' => 'Amazon Advertising'], ['item' => 'YouTube Advertising'],
                ],
                'order' => 6, 'is_active' => true,
            ],
        ];

        foreach ($services as $data) {
            ServiceWeOffer::updateOrCreate(['number' => $data['number']], $data);
        }

        $this->command->info('ServiceWeOfferSeeder: seeded ' . count($services) . ' services.');
    }
}
