<?php

namespace Database\Seeders;

use App\Models\DigitalMarketingService;
use App\Models\DigitalMarketingServiceFeature;
use App\Models\DigitalMarketingServiceDeliverMetric;
use App\Models\DigitalMarketingServiceSolution;
use App\Models\DigitalMarketingServiceStrategy;
use App\Models\DigitalMarketingServiceProcessStep;
use App\Models\DigitalMarketingServiceBenefit;
use Illuminate\Database\Seeder;

class DigitalMarketingServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'slug'             => 'seo',
                'label'            => 'SEO Services',
                'order'            => 1,
                'hero_title'       => 'Search Engine Optimisation (SEO) Services',
                'hero_description' => 'Your customers are searching on Google right now — for exactly what you sell. SEO makes sure they find you first. Our SEO services cover on-page optimisation, technical SEO, local SEO for Nashik businesses, link building, and content strategy. We target keywords with real purchase intent, not just traffic for its own sake.',
                'features'         => [
                    'On-page optimisation for every key landing page',
                    'Technical SEO — site speed, crawlability, Core Web Vitals',
                    'Local SEO for Nashik businesses targeting nearby customers',
                    'Link building to increase domain authority',
                    'Content strategy targeting real purchase intent',
                    'Monthly performance reports with plain-language explanations',
                ],
                'deliver_title'       => 'Complete SEO Solutions',
                'deliver_description' => 'End-to-end SEO services designed to improve your search engine rankings and drive organic growth.',
                'deliver_approach'    => ['Data-driven keyword strategy', 'Technical SEO audit and optimization', 'Content optimization for search intent', 'Link building and authority enhancement', 'Local search optimization', 'Continuous monitoring and adjustment'],
                'deliver_metrics'     => [
                    ['label' => 'Keyword Rankings', 'value' => '90% Improvement', 'order' => 1],
                    ['label' => 'Organic Traffic',  'value' => '200% Increase',   'order' => 2],
                    ['label' => 'Conversion Rate',  'value' => '150% Boost',      'order' => 3],
                    ['label' => 'ROI',              'value' => '5x Average',      'order' => 4],
                ],
                'solutions' => [
                    ['title' => 'Technical SEO',  'description' => "Optimize your website's technical foundation for better crawling and indexing.", 'features' => ['Website speed optimization', 'Mobile responsiveness check', 'Schema markup implementation', 'XML sitemap creation', 'Robots.txt optimization', 'SSL certificate setup'],                   'order' => 1],
                    ['title' => 'On-Page SEO',    'description' => 'Optimize individual pages to rank higher and earn more relevant traffic.',       'features' => ['Keyword optimization', 'Meta tags and descriptions', 'Content structure optimization', 'Image optimization', 'Internal linking strategy', 'User experience optimization'],               'order' => 2],
                    ['title' => 'Content SEO',    'description' => 'Create and optimize content that ranks well and engages your audience.',         'features' => ['Keyword research and analysis', 'Content strategy development', 'Blog post optimization', 'Content gap analysis', 'Content promotion strategy', 'Performance tracking'],                   'order' => 3],
                    ['title' => 'Local SEO',      'description' => 'Optimize your online presence to attract more customers from local searches.',  'features' => ['Google Business Profile optimization', 'Local citation building', 'Review management', 'Local keyword targeting', 'Map pack optimization', 'Local content creation'],                    'order' => 4],
                    ['title' => 'Link Building',  'description' => 'Build high-quality backlinks to improve domain authority and rankings.',        'features' => ['Guest posting strategy', 'Resource link building', 'Broken link building', 'Skyscraper technique', 'Digital PR campaigns', 'Link quality monitoring'],                                   'order' => 5],
                    ['title' => 'SEO Analytics',  'description' => 'Track, measure, and optimize your SEO performance with detailed analytics.',   'features' => ['Rank tracking and reporting', 'Traffic analysis', 'Conversion tracking', 'Competitor analysis', 'ROI measurement', 'Monthly performance reports'],                                    'order' => 6],
                ],
                'strategies_title'       => 'SEO Implementation Strategies',
                'strategies_description' => 'Proven strategies that deliver measurable results in search engine rankings.',
                'strategies'             => [
                    ['title' => 'Keyword Research & Planning', 'description' => 'Comprehensive keyword analysis to target the right search terms.',      'tactics' => ['Competitor keyword analysis', 'Search volume research', 'Keyword difficulty assessment', 'Long-tail keyword targeting', 'Search intent analysis', 'Keyword mapping'],                     'order' => 1],
                    ['title' => 'Content Optimization',        'description' => 'Optimize existing and new content for better search visibility.',        'tactics' => ['Title tag optimization', 'Meta description writing', 'Header tag structuring', 'Image alt text optimization', 'Content quality enhancement', 'Readability improvement'],               'order' => 2],
                    ['title' => 'Technical Optimization',      'description' => 'Improve website technical aspects for better search engine crawling.',   'tactics' => ['Website speed optimization', 'Mobile-first indexing', 'Structured data implementation', 'Canonical tags setup', '404 error resolution', 'Site architecture optimization'],            'order' => 3],
                    ['title' => 'Link Building Strategy',      'description' => 'Build authoritative backlinks to improve domain authority.',             'tactics' => ['Guest posting outreach', 'Resource page link building', 'Broken link building', 'Skyscraper content creation', 'Digital PR campaigns', 'Social media promotion'],                 'order' => 4],
                ],
                'process_title'       => 'Our SEO Process',
                'process_description' => 'A systematic approach to improving your search engine rankings and organic traffic.',
                'process_steps'       => [
                    ['title' => 'SEO Audit & Analysis',       'description' => 'Comprehensive analysis of your current SEO performance.',          'activities' => ['Technical SEO audit', 'Keyword gap analysis', 'Competitor analysis', 'Website performance review', 'Backlink profile analysis', 'Content audit'],                         'order' => 1],
                    ['title' => 'Strategy Development',       'description' => 'Create a customized SEO strategy based on your business goals.',   'activities' => ['Keyword strategy development', 'Content strategy planning', 'Technical optimization plan', 'Link building strategy', 'Local SEO plan', 'Performance benchmarks'],         'order' => 2],
                    ['title' => 'Implementation',             'description' => 'Execute the SEO strategy with precision and expertise.',            'activities' => ['Technical SEO implementation', 'On-page optimization', 'Content creation and optimization', 'Link building execution', 'Local SEO setup', 'Analytics configuration'],  'order' => 3],
                    ['title' => 'Monitoring & Optimization',  'description' => 'Continuously monitor performance and optimize strategies.',         'activities' => ['Rank tracking', 'Traffic monitoring', 'Conversion tracking', 'Performance analysis', 'Strategy adjustment', 'Monthly reporting'],                                     'order' => 4],
                ],
                'benefits_title'       => 'Benefits of Professional SEO',
                'benefits_description' => 'Investing in professional SEO services delivers significant advantages for your business.',
                'benefits'             => [
                    ['title' => 'Increased Visibility',    'description' => 'Higher search rankings lead to more visibility and brand exposure.',                       'order' => 1],
                    ['title' => 'Higher Conversion Rates', 'description' => 'Targeted organic traffic converts better than paid traffic.',                              'order' => 2],
                    ['title' => 'Better ROI',              'description' => 'SEO delivers long-term results with better return on investment.',                         'order' => 3],
                    ['title' => 'Brand Authority',         'description' => 'Top rankings build trust and establish your brand as an authority.',                       'order' => 4],
                    ['title' => 'Targeted Audience',       'description' => 'Reach users actively searching for your products or services.',                           'order' => 5],
                    ['title' => 'Measurable Results',      'description' => 'Track progress with concrete metrics and analytics.',                                      'order' => 6],
                ],
            ],

            [
                'slug' => 'social-media-marketing', 'label' => 'Social Media Marketing', 'order' => 2,
                'hero_title'       => 'Social Media Marketing',
                'hero_description' => 'Instagram, Facebook, LinkedIn — your audience is active on at least two of these every day. Our social media marketing team creates content that stops the scroll, builds brand recognition, and converts followers into paying customers. We manage your profiles end-to-end so you can focus on running your business.',
                'features'         => ['Content strategy and monthly content calendar', 'Post creation, design, and copywriting', 'Community management and audience engagement', 'Paid social media advertising on Meta and LinkedIn', 'Performance analytics and monthly reporting', 'Profile optimisation and branding consistency'],
                'deliver_title' => null, 'deliver_description' => null, 'deliver_approach' => [], 'deliver_metrics' => [],
                'solutions' => [], 'strategies_title' => null, 'strategies_description' => null, 'strategies' => [],
                'process_title' => null, 'process_description' => null, 'process_steps' => [],
                'benefits_title' => null, 'benefits_description' => null, 'benefits' => [],
            ],

            [
                'slug' => 'ppc-advertising', 'label' => 'PPC Advertising', 'order' => 3,
                'hero_title'       => 'Pay-Per-Click (PPC) Advertising — Google Ads & Meta Ads',
                'hero_description' => 'When you need leads now — not in three months — PPC delivers. We run highly targeted Google Ads and Meta Ads campaigns optimised for cost-per-lead, not just clicks. Every rupee of your ad budget is tracked, measured, and optimised for maximum ROI.',
                'features'         => ['Google Ads — Search, Display, and Shopping campaigns', 'Meta Ads — Facebook and Instagram targeted advertising', 'Keyword research and competitor bid analysis', 'Ad copy and creative development', 'Landing page design for maximum conversion', 'Monthly reports with cost-per-lead and ROI breakdown'],
                'deliver_title' => null, 'deliver_description' => null, 'deliver_approach' => [], 'deliver_metrics' => [],
                'solutions' => [], 'strategies_title' => null, 'strategies_description' => null, 'strategies' => [],
                'process_title' => null, 'process_description' => null, 'process_steps' => [],
                'benefits_title' => null, 'benefits_description' => null, 'benefits' => [],
            ],

            [
                'slug' => 'content-marketing', 'label' => 'Content Marketing', 'order' => 4,
                'hero_title'       => 'Content Marketing',
                'hero_description' => 'Content that ranks, educates, and converts. Our content marketing service covers blog writing, website copy, video scripts, case studies, and email newsletters — all written with SEO best practices and your audience\'s intent in mind.',
                'features'         => ['Blog writing and SEO article creation', 'Website copy and landing page content', 'Video scripts for YouTube and social media', 'Case studies and client success stories', 'Email newsletters with audience-specific messaging', 'Content distribution strategy across channels'],
                'deliver_title' => null, 'deliver_description' => null, 'deliver_approach' => [], 'deliver_metrics' => [],
                'solutions' => [], 'strategies_title' => null, 'strategies_description' => null, 'strategies' => [],
                'process_title' => null, 'process_description' => null, 'process_steps' => [],
                'benefits_title' => null, 'benefits_description' => null, 'benefits' => [],
            ],

            [
                'slug' => 'email-marketing', 'label' => 'Email Marketing', 'order' => 5,
                'hero_title'       => 'Email Marketing',
                'hero_description' => 'Email delivers the highest ROI of any digital marketing channel — ₹42 returned for every ₹1 spent on average. Our email marketing campaigns are personalised, automated, and designed to nurture your leads through every stage of the buying journey.',
                'features'         => ['Promotional campaigns for offers, launches, and events', 'Automated drip sequences and onboarding flows', 'Personalised subject lines and audience segmentation', 'A/B testing for subject lines and send times', 'DKIM, SPF, and DMARC setup for inbox delivery', 'Performance analytics and list health management'],
                'deliver_title' => null, 'deliver_description' => null, 'deliver_approach' => [], 'deliver_metrics' => [],
                'solutions' => [], 'strategies_title' => null, 'strategies_description' => null, 'strategies' => [],
                'process_title' => null, 'process_description' => null, 'process_steps' => [],
                'benefits_title' => null, 'benefits_description' => null, 'benefits' => [],
            ],

            [
                'slug' => 'whatsapp-marketing', 'label' => 'WhatsApp Marketing', 'order' => 6,
                'hero_title'       => 'WhatsApp Marketing Services',
                'hero_description' => 'With over 500 million WhatsApp users in India, marketing on WhatsApp is no longer optional — it is essential. Through our official Meta Verified WhatsApp Business API, we help you send broadcast campaigns, automate follow-up sequences, and run catalogue-based selling directly on WhatsApp.',
                'features'         => ['Broadcast campaigns to unlimited contacts via Meta Verified API', 'Automated drip sequences for lead nurturing', 'WhatsApp catalogue selling for retail and FMCG brands', 'Keyword-triggered auto-replies for instant response', 'Multi-agent shared inbox for team conversations', 'Green tick verified business identity'],
                'deliver_title' => null, 'deliver_description' => null, 'deliver_approach' => [], 'deliver_metrics' => [],
                'solutions' => [], 'strategies_title' => null, 'strategies_description' => null, 'strategies' => [],
                'process_title' => null, 'process_description' => null, 'process_steps' => [],
                'benefits_title' => null, 'benefits_description' => null, 'benefits' => [],
            ],

            [
                'slug' => 'bulk-sms', 'label' => 'Bulk SMS Marketing', 'order' => 7,
                'hero_title'       => 'Bulk SMS Service Provider in India — Fast, DLT-Compliant & Reliable',
                'hero_description' => 'Think about the last time a message from a brand actually made you stop and read. Chances are, it came as an SMS — short, direct, delivered straight to your phone. No algorithm. No ad budget competition. Just your message, in front of your customer, within seconds. Rich System Solutions has been providing bulk SMS services across India since 2009. With over 16 years of platform reliability, DLT-compliant infrastructure, and a delivery rate that consistently exceeds 99%, we are the bulk SMS partner that businesses trust when it matters most.',
                'features'         => ['Promotional bulk SMS for offers, events, and campaigns', 'Transactional SMS — 24/7 including Sundays and public holidays', 'OTP SMS with priority routing — delivered in under 3 seconds', 'API-based SMS integration with REST API and full documentation', 'DLT registration assistance — full TRAI compliance handled', 'Real-time delivery reports and campaign analytics'],
                'deliver_title' => null, 'deliver_description' => null, 'deliver_approach' => [], 'deliver_metrics' => [],
                'solutions' => [], 'strategies_title' => null, 'strategies_description' => null, 'strategies' => [],
                'process_title' => null, 'process_description' => null, 'process_steps' => [],
                'benefits_title' => null, 'benefits_description' => null, 'benefits' => [],
            ],

            [
                'slug' => 'graphic-design', 'label' => 'Graphic Design', 'order' => 8,
                'hero_title'       => 'Graphic Design for Digital Marketing',
                'hero_description' => 'Compelling visuals are the backbone of every digital campaign. Our in-house design team creates social media creatives, ad banners, landing page visuals, infographics, and brand identity assets that make your marketing stand out.',
                'features'         => ['Social media post and story templates for Instagram, Facebook, LinkedIn', 'Digital ad creatives for Google Display, Facebook Ads, Instagram Ads', 'Landing page visuals and hero banners', 'Infographics and data visualisation', 'Brand identity assets — logo, colour palette, typography', 'WhatsApp campaign creatives and catalogues'],
                'deliver_title' => null, 'deliver_description' => null, 'deliver_approach' => [], 'deliver_metrics' => [],
                'solutions' => [], 'strategies_title' => null, 'strategies_description' => null, 'strategies' => [],
                'process_title' => null, 'process_description' => null, 'process_steps' => [],
                'benefits_title' => null, 'benefits_description' => null, 'benefits' => [],
            ],

            [
                'slug' => 'video-marketing', 'label' => 'Video Marketing', 'order' => 9,
                'hero_title'       => 'Video Marketing Services: Engage & Convert with Visual Content',
                'hero_description' => 'Create compelling video content that tells your brand story, explains products, and drives engagement across platforms.',
                'features'         => ['Video strategy development', 'Scriptwriting and storyboarding', 'Video production and editing', 'Animation and motion graphics', 'Video SEO optimization', 'Distribution strategy'],
                'deliver_title' => null, 'deliver_description' => null, 'deliver_approach' => [], 'deliver_metrics' => [],
                'solutions' => [], 'strategies_title' => null, 'strategies_description' => null, 'strategies' => [],
                'process_title' => null, 'process_description' => null, 'process_steps' => [],
                'benefits_title' => null, 'benefits_description' => null, 'benefits' => [],
            ],
        ];

        foreach ($services as $data) {
            $service = DigitalMarketingService::updateOrCreate(
                ['slug' => $data['slug']],
                [
                    'label'                  => $data['label'],
                    'order'                  => $data['order'],
                    'is_active'              => true,
                    'hero_title'             => $data['hero_title'],
                    'hero_description'       => $data['hero_description'],
                    'deliver_title'          => $data['deliver_title'] ?? null,
                    'deliver_description'    => $data['deliver_description'] ?? null,
                    'deliver_approach'       => !empty($data['deliver_approach'])
                                                    ? array_map(fn($a) => ['item' => $a], $data['deliver_approach'])
                                                    : null,
                    'process_title'          => $data['process_title'] ?? null,
                    'process_description'    => $data['process_description'] ?? null,
                    'strategies_title'       => $data['strategies_title'] ?? null,
                    'strategies_description' => $data['strategies_description'] ?? null,
                    'benefits_title'         => $data['benefits_title'] ?? null,
                    'benefits_description'   => $data['benefits_description'] ?? null,
                ]
            );

            // Sync features
            $service->features()->delete();
            foreach ($data['features'] as $i => $feature) {
                DigitalMarketingServiceFeature::create(['service_id' => $service->id, 'feature' => $feature, 'order' => $i + 1]);
            }

            // Sync deliver metrics
            $service->deliverMetrics()->delete();
            foreach ($data['deliver_metrics'] as $m) {
                DigitalMarketingServiceDeliverMetric::create([
                    'service_id' => $service->id,
                    'label'      => $m['label'],
                    'value'      => $m['value'],
                    'order'      => $m['order'],
                ]);
            }

            // Sync solutions
            $service->solutions()->delete();
            foreach ($data['solutions'] as $s) {
                DigitalMarketingServiceSolution::create([
                    'service_id'  => $service->id,
                    'title'       => $s['title'],
                    'description' => $s['description'],
                    'features'    => array_map(fn($f) => ['item' => $f], $s['features']),
                    'order'       => $s['order'],
                ]);
            }

            // Sync strategies
            $service->strategies()->delete();
            foreach ($data['strategies'] as $s) {
                DigitalMarketingServiceStrategy::create([
                    'service_id'  => $service->id,
                    'title'       => $s['title'],
                    'description' => $s['description'],
                    'tactics'     => array_map(fn($t) => ['item' => $t], $s['tactics']),
                    'order'       => $s['order'],
                ]);
            }

            // Sync process steps
            $service->processSteps()->delete();
            foreach ($data['process_steps'] as $s) {
                DigitalMarketingServiceProcessStep::create([
                    'service_id'  => $service->id,
                    'title'       => $s['title'],
                    'description' => $s['description'],
                    'activities'  => array_map(fn($a) => ['item' => $a], $s['activities']),
                    'order'       => $s['order'],
                ]);
            }

            // Sync benefits
            $service->benefits()->delete();
            foreach ($data['benefits'] as $b) {
                DigitalMarketingServiceBenefit::create([
                    'service_id'  => $service->id,
                    'title'       => $b['title'],
                    'description' => $b['description'],
                    'order'       => $b['order'],
                ]);
            }
        }
    }
}
