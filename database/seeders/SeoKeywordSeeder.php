<?php

namespace Database\Seeders;

use App\Models\SeoKeywordGroup;
use App\Models\SeoKeyword;
use Illuminate\Database\Seeder;

class SeoKeywordSeeder extends Seeder
{
    public function run(): void
    {
        $groups = [
            [
                'group_key'   => 'nashikCore',
                'label'       => 'Nashik Core Keywords',
                'description' => 'Nashik city geo keywords — local SEO, highest priority',
                'order'       => 1,
                'keywords'    => [
                    'software company in Nashik',
                    'IT company Nashik',
                    'software development company Nashik',
                    'digital marketing agency Nashik',
                    'website development Nashik',
                    'web development company Nashik',
                    'custom software development Nashik',
                    'mobile app development Nashik',
                    'IT services Nashik',
                    'Rich System Solutions Nashik',
                ],
            ],
            [
                'group_key'   => 'maharashtra',
                'label'       => 'Maharashtra Keywords',
                'description' => 'Maharashtra state geo keywords — regional reach',
                'order'       => 2,
                'keywords'    => [
                    'software company Maharashtra',
                    'IT company Maharashtra',
                    'digital marketing agency Maharashtra',
                    'website development company Maharashtra',
                    'bulk SMS services Maharashtra',
                    'WhatsApp Business API Maharashtra',
                    'SEO services Maharashtra',
                    'mobile app development Maharashtra',
                ],
            ],
            [
                'group_key'   => 'nashikArea',
                'label'       => 'Nashik Area Keywords',
                'description' => 'Nashik neighbourhood and area-level keywords',
                'order'       => 3,
                'keywords'    => [
                    'IT company Tilakwadi Nashik',
                    'software company Nashik MIDC',
                    'web development Ambad Nashik',
                    'digital marketing Nashik Pune road',
                    'software services Nashik 422002',
                ],
            ],
            [
                'group_key'   => 'softwareDev',
                'label'       => 'Software Development Keywords',
                'description' => 'Keywords for custom software and web development services',
                'order'       => 4,
                'keywords'    => [
                    'custom software development',
                    'software development company',
                    'enterprise software development',
                    'business software solutions',
                    'web development services',
                    'website development company',
                    'responsive website design',
                    'Next.js development',
                    'React development',
                    'mobile app development',
                    'iOS app development',
                    'Android app development',
                    'cross-platform app development',
                    'ecommerce development',
                    'cloud solutions',
                    'API integration services',
                    'software maintenance support',
                ],
            ],
            [
                'group_key'   => 'digitalMarketing',
                'label'       => 'Digital Marketing Keywords',
                'description' => 'Keywords for SEO, social media, PPC and content marketing',
                'order'       => 5,
                'keywords'    => [
                    'digital marketing agency',
                    'SEO services',
                    'search engine optimization',
                    'social media marketing',
                    'Facebook marketing',
                    'Instagram marketing',
                    'PPC advertising',
                    'Google Ads management',
                    'content marketing',
                    'video marketing',
                    'email marketing',
                    'graphic design services',
                    'logo design',
                    'online marketing company',
                    'lead generation services',
                ],
            ],
            [
                'group_key'   => 'bulkSMS',
                'label'       => 'Bulk SMS Keywords',
                'description' => 'Keywords for bulk SMS and messaging services',
                'order'       => 6,
                'keywords'    => [
                    'bulk SMS service',
                    'bulk SMS provider',
                    'promotional SMS',
                    'transactional SMS',
                    'OTP SMS service',
                    'SMS marketing',
                    'mass text messaging',
                    'SMS campaign management',
                    'bulk SMS platform',
                    'SMS alert service',
                ],
            ],
            [
                'group_key'   => 'whatsapp',
                'label'       => 'WhatsApp Keywords',
                'description' => 'Keywords for WhatsApp Business API and chatbot services',
                'order'       => 7,
                'keywords'    => [
                    'WhatsApp Business API',
                    'WhatsApp API provider',
                    'Meta Verified WhatsApp',
                    'WhatsApp marketing service',
                    'bulk WhatsApp messaging',
                    'WhatsApp chatbot',
                    'WhatsApp automation',
                    'WhatsApp Business solutions',
                    'WhatsApp for business India',
                    'official WhatsApp API',
                ],
            ],
            [
                'group_key'   => 'communication',
                'label'       => 'Business Communication Keywords',
                'description' => 'Keywords for IVR, voice broadcasting and alert systems',
                'order'       => 8,
                'keywords'    => [
                    'IVR system development',
                    'interactive voice response',
                    'bulk voice messaging',
                    'voice broadcasting',
                    'alert notification system',
                    'business communication solutions',
                    'automated call system',
                    'call center solutions',
                    'real-time alerts',
                    'digital automation',
                ],
            ],
            [
                'group_key'   => 'training',
                'label'       => 'IT Training & Internship Keywords',
                'description' => 'Keywords for IT training programs and internship opportunities',
                'order'       => 9,
                'keywords'    => [
                    'IT training Nashik',
                    'software internship Nashik',
                    'digital marketing internship Nashik',
                    'IT internship program',
                    'web development training',
                    'software training institute Nashik',
                    'learn digital marketing Nashik',
                    'tech internship Maharashtra',
                ],
            ],
            [
                'group_key'   => 'ecommerce',
                'label'       => 'E-Commerce Keywords',
                'description' => 'Keywords for e-commerce development and online store solutions',
                'order'       => 10,
                'keywords'    => [
                    'ecommerce website development',
                    'online store development',
                    'shopping cart development',
                    'payment gateway integration',
                    'WooCommerce development',
                    'Shopify development',
                    'B2B ecommerce platform',
                ],
            ],
            [
                'group_key'   => 'design',
                'label'       => 'Design Keywords',
                'description' => 'Keywords for graphic design, branding and UI/UX services',
                'order'       => 11,
                'keywords'    => [
                    'graphic design services',
                    'logo design',
                    'brand identity design',
                    'UI UX design',
                    'user experience design',
                    'creative design agency',
                    'marketing materials design',
                    'social media design',
                ],
            ],
        ];

        foreach ($groups as $index => $groupData) {
            $keywords = $groupData['keywords'];
            unset($groupData['keywords']);

            $group = SeoKeywordGroup::updateOrCreate(
                ['group_key' => $groupData['group_key']],
                $groupData
            );

            // Rebuild keywords for this group
            SeoKeyword::where('group_id', $group->id)->delete();

            foreach ($keywords as $order => $keyword) {
                SeoKeyword::create([
                    'group_id' => $group->id,
                    'keyword'  => $keyword,
                    'order'    => $order,
                    'is_active'=> true,
                ]);
            }
        }
    }
}
