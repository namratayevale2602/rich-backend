<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        // Categories
        $categories = [
            ['name' => 'Digital Marketing',        'slug' => 'digital-marketing',       'order' => 1],
            ['name' => 'SMS Marketing',             'slug' => 'sms-marketing',            'order' => 2],
            ['name' => 'WhatsApp',                  'slug' => 'whatsapp',                 'order' => 3],
            ['name' => 'SEO',                       'slug' => 'seo',                      'order' => 4],
            ['name' => 'Graphic Design',            'slug' => 'graphic-design',           'order' => 5],
            ['name' => 'IVR System',                'slug' => 'ivr-system',               'order' => 6],
            ['name' => 'Software Development',      'slug' => 'software-development',     'order' => 7],
            ['name' => 'Communication & Automation','slug' => 'communication-automation', 'order' => 8],
        ];

        foreach ($categories as $data) {
            BlogCategory::updateOrCreate(['slug' => $data['slug']], array_merge($data, ['is_active' => true]));
        }

        // Tags
        $tagNames = [
            'Social Media Marketing', 'Business Growth', 'Digital Marketing', 'Automation',
            'RICH System Solutions', 'Custom Software Development', 'Software Company', 'Nashik',
            'Web Development', 'Mobile Apps', 'Communication', 'WhatsApp Business API',
            'Bulk SMS', 'IVR', 'SEO', 'PPC', 'Lead Generation', 'Branding',
            'SMS Marketing', 'WhatsApp API', 'Nashik MIDC', 'Maharashtra Business',
            'Graphic Design', 'Customer Service',
        ];

        foreach ($tagNames as $name) {
            BlogTag::updateOrCreate(['slug' => Str::slug($name)], ['name' => $name, 'slug' => Str::slug($name), 'is_active' => true]);
        }

        $posts = [
            [
                'title'       => 'Why Social Media Marketing Matters for Business Growth in 2026',
                'slug'        => 'why-social-media-marketing-matters-2026',
                'category'    => 'digital-marketing',
                'excerpt'     => 'Discover why social media marketing is essential for business growth in 2026. Learn how professional digital marketing, software development, and automation can transform your brand.',
                'read_time'   => '8 min read',
                'featured'    => true,
                'image'       => 'https://images.unsplash.com/photo-1611162617213-7d7a39e9b1d7?w=800&auto=format&q=80',
                'tags'        => ['Social Media Marketing', 'Business Growth', 'Digital Marketing', 'Automation', 'RICH System Solutions'],
                'published_at'=> '2024-03-15',
                'order'       => 1,
                'content'     => '<p>Let\'s be honest — the old ways of marketing aren\'t cutting it anymore. If you want your business to grow, you have to get serious about social media. Platforms like Instagram, Facebook, LinkedIn, and YouTube aren\'t just for sharing photos or videos. They\'re where your customers hang out, discover brands, talk about what they love, and — most importantly — buy things.</p><h2>The Real Impact of Social Media</h2><p>A strong social media presence does way more than just make your brand look good. It helps you reach new customers, build trust, bring in quality leads, boost engagement, and drive traffic to your website.</p><h2>Why You Need Professional Digital Marketing</h2><p>Posting random content isn\'t enough. If there\'s no plan, your effort won\'t pay off. Growth comes from smart planning, clear branding, precise targeting, solid analytics, and regular tweaking.</p>',
            ],
            [
                'title'       => 'Why Custom Software Development Matters for Modern Businesses',
                'slug'        => 'why-custom-software-development-matters-modern-businesses',
                'category'    => 'software-development',
                'excerpt'     => 'Let\'s face it: just having basic tools isn\'t enough anymore. Business moves fast, and every company faces its own set of challenges and goals. That\'s why custom software development has become a game-changer.',
                'read_time'   => '9 min read',
                'featured'    => true,
                'image'       => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=800&auto=format&q=80',
                'tags'        => ['Custom Software Development', 'Business Growth', 'Software Company', 'Nashik', 'RICH System Solutions', 'Web Development', 'Mobile Apps'],
                'published_at'=> '2024-03-16',
                'order'       => 2,
                'content'     => '<p>Let\'s face it: just having basic tools isn\'t enough anymore. Business moves fast and every company faces its own set of challenges and goals. That\'s why custom software development has become a game-changer.</p><h2>What Custom Software Development Really Means</h2><p>Custom software development isn\'t just a fancy phrase. It\'s about creating applications specifically for your business, instead of forcing generic software to handle your unique processes.</p><h2>Why Businesses Choose Custom Solutions</h2><p>Ready-made software often feels like it\'s missing the mark. Too many features you\'ll never use — or lacking what you really need.</p>',
            ],
            [
                'title'       => 'Why Communication and Automation Matter for Modern Businesses',
                'slug'        => 'why-communication-and-automation-matter-modern-businesses',
                'category'    => 'communication-automation',
                'excerpt'     => 'Let\'s be real: business moves fast and expectations are even faster. Staying connected with your customers isn\'t optional — it\'s everything.',
                'read_time'   => '10 min read',
                'featured'    => true,
                'image'       => 'https://images.unsplash.com/photo-1557804506-669a67965ba0?w=800&auto=format&q=80',
                'tags'        => ['Communication', 'Automation', 'WhatsApp Business API', 'Bulk SMS', 'IVR', 'Business Growth', 'RICH System Solutions', 'Nashik'],
                'published_at'=> '2024-03-17',
                'order'       => 3,
                'content'     => '<p>Let\'s be real: business moves fast and expectations are even faster. Staying connected with your customers isn\'t optional — it\'s everything.</p><h2>What Do We Mean by Communication & Automation Solutions?</h2><p>Think of these as your smart digital assistants. They handle everything from sending messages, alerts, and reminders to automating day-to-day support and updates.</p><h2>Why Automation Just Works</h2><p>Trying to handle everything manually turns your day into a juggling act. Things get missed, and it\'s tough to scale. Automation cleans that mess up.</p>',
            ],
            [
                'title'       => 'Why Digital Marketing Matters for Business Growth',
                'slug'        => 'why-digital-marketing-matters-for-business-growth',
                'category'    => 'digital-marketing',
                'excerpt'     => 'Digital marketing isn\'t just a buzzword anymore — it\'s the backbone of how businesses grow and connect with customers today.',
                'read_time'   => '11 min read',
                'featured'    => true,
                'image'       => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&auto=format&q=80',
                'tags'        => ['Digital Marketing', 'SEO', 'Social Media Marketing', 'PPC', 'Lead Generation', 'Branding', 'RICH System Solutions', 'Nashik'],
                'published_at'=> '2024-03-18',
                'order'       => 4,
                'content'     => '<p>Digital marketing isn\'t just a buzzword anymore — it\'s the backbone of how businesses grow and connect with customers today.</p><h2>Why Digital Marketing Matters More Than Ever</h2><p>Traditional marketing is getting left behind, especially in a world where there are so many options and so much noise. If your customers can\'t find you online, you\'re basically invisible.</p><h2>Our Digital Marketing Services</h2><p>At RICH System Solutions, we cover pretty much everything businesses in Maharashtra need to market themselves online.</p>',
            ],
        ];

        foreach ($posts as $data) {
            $category = BlogCategory::where('slug', $data['category'])->first();
            if (!$category) continue;

            $blog = Blog::updateOrCreate(
                ['slug' => $data['slug']],
                [
                    'blog_category_id' => $category->id,
                    'title'            => $data['title'],
                    'excerpt'          => $data['excerpt'],
                    'content'          => $data['content'],
                    'image'            => $data['image'],
                    'author'           => 'Priya Sharma',
                    'author_role'      => 'Digital Marketing Specialist',
                    'read_time'        => $data['read_time'],
                    'featured'         => $data['featured'],
                    'is_active'        => true,
                    'published_at'     => $data['published_at'],
                    'order'            => $data['order'],
                ]
            );

            $tagIds = BlogTag::whereIn('name', $data['tags'])->pluck('id')->toArray();
            $blog->tags()->sync($tagIds);
        }
    }
}
