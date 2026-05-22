<?php

namespace Database\Seeders;

use App\Models\ServiceSlider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ServiceSliderSeeder extends Seeder
{
    /**
     * Copies product images from the Next.js public folder to
     * public/uploads/service-slider/ and seeds all service slider records.
     */
    public function run(): void
    {
        $frontendPublic = base_path('../richsol/public/productsimg');
        $mainDir        = public_path('uploads/service-slider');
        $responsiveDir  = public_path('uploads/service-slider/responsive');

        File::ensureDirectoryExists($mainDir);
        File::ensureDirectoryExists($responsiveDir);

        // All image files to copy: [ source_filename => destination_path ]
        $filesToCopy = [
            // Main images  →  uploads/service-slider/
            'rechservises.webp'        => $mainDir . '/rechservises.webp',
            'bulkvoiece.webp'          => $mainDir . '/bulkvoiece.webp',
            'whatsappservice.webp'     => $mainDir . '/whatsappservice.webp',
            'digitalmarketing.webp'    => $mainDir . '/digitalmarketing.webp',
            'whatsAppchatbot.webp'     => $mainDir . '/whatsAppchatbot.webp',
            'digitalautomation.webp'   => $mainDir . '/digitalautomation.webp',
            'designdevelopmment.webp'  => $mainDir . '/designdevelopmment.webp',
            'graphics.webp'            => $mainDir . '/graphics.webp',
            'alertsystem.webp'         => $mainDir . '/alertsystem.webp',
            'ivrsystem.webp'           => $mainDir . '/ivrsystem.webp',
            'bulkemail.webp'           => $mainDir . '/bulkemail.webp',

            // Responsive images  →  uploads/service-slider/responsive/
            'rechservises-440.webp'         => $responsiveDir . '/rechservises-440.webp',
            'rechservises_700x933.webp'     => $responsiveDir . '/rechservises_700x933.webp',
            'rechservises_1300x1750.webp'   => $responsiveDir . '/rechservises_1300x1750.webp',
            'rechservises_1800x2400.webp'   => $responsiveDir . '/rechservises_1800x2400.webp',

            'bulkvoiece-440.webp'           => $responsiveDir . '/bulkvoiece-440.webp',
            'bulkvoiece_600x800.webp'       => $responsiveDir . '/bulkvoiece_600x800.webp',
            'bulkvoiece_1050x1400.webp'     => $responsiveDir . '/bulkvoiece_1050x1400.webp',
            'bulkvoiece_1500x2000.webp'     => $responsiveDir . '/bulkvoiece_1500x2000.webp',

            'whatsappservice-440.webp'      => $responsiveDir . '/whatsappservice-440.webp',
            'whatsappservice_600x800.webp'  => $responsiveDir . '/whatsappservice_600x800.webp',
            'whatsappservice_1050x1400.webp'=> $responsiveDir . '/whatsappservice_1050x1400.webp',
            'whatsappservice_1500x2000.webp'=> $responsiveDir . '/whatsappservice_1500x2000.webp',

            'digitalmarketing-440.webp'     => $responsiveDir . '/digitalmarketing-440.webp',
            'digitalmarketing-600.webp'     => $responsiveDir . '/digitalmarketing-600.webp',

            'whatsAppchatbot-440.webp'      => $responsiveDir . '/whatsAppchatbot-440.webp',
            'whatsAppchatbot-600.webp'      => $responsiveDir . '/whatsAppchatbot-600.webp',

            'digitalautomation-440.webp'    => $responsiveDir . '/digitalautomation-440.webp',
            'digitalautomation-600.webp'    => $responsiveDir . '/digitalautomation-600.webp',

            'designdevelopmment-440.webp'   => $responsiveDir . '/designdevelopmment-440.webp',
            'designdevelopmment-600.webp'   => $responsiveDir . '/designdevelopmment-600.webp',

            'graphics-440.webp'             => $responsiveDir . '/graphics-440.webp',
            'graphics-600.webp'             => $responsiveDir . '/graphics-600.webp',

            'alertsystem-440.webp'          => $responsiveDir . '/alertsystem-440.webp',
            'alertsystem-600.webp'          => $responsiveDir . '/alertsystem-600.webp',

            'ivrsystem-440.webp'            => $responsiveDir . '/ivrsystem-440.webp',
            'ivrsystem_600x800.webp'        => $responsiveDir . '/ivrsystem_600x800.webp',
            'ivrsystem_1050x1400.webp'      => $responsiveDir . '/ivrsystem_1050x1400.webp',
            'ivrsystem_1500x2000.webp'      => $responsiveDir . '/ivrsystem_1500x2000.webp',

            'bulkemail-440.webp'            => $responsiveDir . '/bulkemail-440.webp',
            'bulkemail_600x800.webp'        => $responsiveDir . '/bulkemail_600x800.webp',
            'bulkemail_1050x1400.webp'      => $responsiveDir . '/bulkemail_1050x1400.webp',
            'bulkemail_1500x2000.webp'      => $responsiveDir . '/bulkemail_1500x2000.webp',
        ];

        foreach ($filesToCopy as $srcName => $dest) {
            $src = $frontendPublic . DIRECTORY_SEPARATOR . $srcName;
            if (File::exists($src) && !File::exists($dest)) {
                File::copy($src, $dest);
            }
        }

        // Seed records — matches static productsData in ServiceSlider.jsx
        $services = [
            [
                'title'        => 'Bulk SMS',
                'product_name' => 'bulk-sms',
                'description'  => 'Reliable bulk SMS services for marketing campaigns, alerts, and notifications. Reach thousands instantly with our robust SMS platform.',
                'image'        => 'service-slider/rechservises.webp',
                'image_440'    => 'service-slider/responsive/rechservises-440.webp',
                'image_600'    => 'service-slider/responsive/rechservises_700x933.webp',
                'image_1050'   => 'service-slider/responsive/rechservises_1300x1750.webp',
                'image_1500'   => 'service-slider/responsive/rechservises_1800x2400.webp',
                'icon'         => 'MessageSquare',
                'category'     => 'Communication',
                'slug'         => 'bulk-sms',
                'order'        => 1,
                'is_active'    => true,
            ],
            [
                'title'        => 'Bulk Voice',
                'product_name' => 'bulk-voice',
                'description'  => 'Professional bulk voice messaging services for customer engagement, alerts, and marketing campaigns with high delivery rates.',
                'image'        => 'service-slider/bulkvoiece.webp',
                'image_440'    => 'service-slider/responsive/bulkvoiece-440.webp',
                'image_600'    => 'service-slider/responsive/bulkvoiece_600x800.webp',
                'image_1050'   => 'service-slider/responsive/bulkvoiece_1050x1400.webp',
                'image_1500'   => 'service-slider/responsive/bulkvoiece_1500x2000.webp',
                'icon'         => 'Phone',
                'category'     => 'Communication',
                'slug'         => 'bulk-voice',
                'order'        => 2,
                'is_active'    => true,
            ],
            [
                'title'        => 'WhatsApp Services',
                'product_name' => 'whatsapp-services',
                'description'  => 'Official WhatsApp Business API services for marketing, customer support, and automated messaging with high engagement rates.',
                'image'        => 'service-slider/whatsappservice.webp',
                'image_440'    => 'service-slider/responsive/whatsappservice-440.webp',
                'image_600'    => 'service-slider/responsive/whatsappservice_600x800.webp',
                'image_1050'   => 'service-slider/responsive/whatsappservice_1050x1400.webp',
                'image_1500'   => 'service-slider/responsive/whatsappservice_1500x2000.webp',
                'icon'         => 'Smartphone',
                'category'     => 'Communication',
                'slug'         => 'whatsapp-service',
                'order'        => 3,
                'is_active'    => true,
            ],
            [
                'title'        => 'Digital Marketing',
                'product_name' => 'digital-marketing',
                'description'  => 'Comprehensive digital marketing services including SEO, social media marketing, PPC, and content marketing to grow your business online.',
                'image'        => 'service-slider/digitalmarketing.webp',
                'image_440'    => 'service-slider/responsive/digitalmarketing-440.webp',
                'image_600'    => 'service-slider/responsive/digitalmarketing-600.webp',
                'image_1050'   => null,
                'image_1500'   => null,
                'icon'         => 'Megaphone',
                'category'     => 'Marketing',
                'slug'         => 'digital-marketing',
                'order'        => 4,
                'is_active'    => true,
            ],
            [
                'title'        => 'WhatsApp Chatbot',
                'product_name' => 'whatsapp-chatbot',
                'description'  => 'Intelligent WhatsApp chatbots for customer service, lead generation, and automated conversations. 24/7 customer support solutions.',
                'image'        => 'service-slider/whatsAppchatbot.webp',
                'image_440'    => 'service-slider/responsive/whatsAppchatbot-440.webp',
                'image_600'    => 'service-slider/responsive/whatsAppchatbot-600.webp',
                'image_1050'   => null,
                'image_1500'   => null,
                'icon'         => 'Bot',
                'category'     => 'Automation',
                'slug'         => 'whats-chatbot',
                'order'        => 5,
                'is_active'    => true,
            ],
            [
                'title'        => 'Digital Automation',
                'product_name' => 'digital-automation',
                'description'  => 'Advanced automation solutions for business processes, workflow optimization, and operational efficiency improvement.',
                'image'        => 'service-slider/digitalautomation.webp',
                'image_440'    => 'service-slider/responsive/digitalautomation-440.webp',
                'image_600'    => 'service-slider/responsive/digitalautomation-600.webp',
                'image_1050'   => null,
                'image_1500'   => null,
                'icon'         => 'Zap',
                'category'     => 'Automation',
                'slug'         => 'digital-auto',
                'order'        => 6,
                'is_active'    => true,
            ],
            [
                'title'        => 'Design & Development',
                'product_name' => 'design-development',
                'description'  => 'Professional website design, web development, and mobile app development services to establish your strong digital presence.',
                'image'        => 'service-slider/designdevelopmment.webp',
                'image_440'    => 'service-slider/responsive/designdevelopmment-440.webp',
                'image_600'    => 'service-slider/responsive/designdevelopmment-600.webp',
                'image_1050'   => null,
                'image_1500'   => null,
                'icon'         => 'Code',
                'category'     => 'Development',
                'slug'         => 'design-develop',
                'order'        => 7,
                'is_active'    => true,
            ],
            [
                'title'        => 'Graphic Design',
                'product_name' => 'graphic-design',
                'description'  => 'Professional graphic design services including logos, branding, marketing materials, and digital graphics for your business.',
                'image'        => 'service-slider/graphics.webp',
                'image_440'    => 'service-slider/responsive/graphics-440.webp',
                'image_600'    => 'service-slider/responsive/graphics-600.webp',
                'image_1050'   => null,
                'image_1500'   => null,
                'icon'         => 'Palette',
                'category'     => 'Creative',
                'slug'         => 'graphic-design',
                'order'        => 8,
                'is_active'    => true,
            ],
            [
                'title'        => 'Alert System',
                'product_name' => 'alert-system',
                'description'  => 'Custom alert and notification systems for businesses. Real-time alerts via SMS, voice, email, and push notifications.',
                'image'        => 'service-slider/alertsystem.webp',
                'image_440'    => 'service-slider/responsive/alertsystem-440.webp',
                'image_600'    => 'service-slider/responsive/alertsystem-600.webp',
                'image_1050'   => null,
                'image_1500'   => null,
                'icon'         => 'AlertCircle',
                'category'     => 'Automation',
                'slug'         => 'alert-system',
                'order'        => 9,
                'is_active'    => true,
            ],
            [
                'title'        => 'IVR System',
                'product_name' => 'ivr-system',
                'description'  => 'Professional IVR system development for call centers and businesses. Automate customer interactions and improve call management.',
                'image'        => 'service-slider/ivrsystem.webp',
                'image_440'    => 'service-slider/responsive/ivrsystem-440.webp',
                'image_600'    => 'service-slider/responsive/ivrsystem_600x800.webp',
                'image_1050'   => 'service-slider/responsive/ivrsystem_1050x1400.webp',
                'image_1500'   => 'service-slider/responsive/ivrsystem_1500x2000.webp',
                'icon'         => 'PhoneCall',
                'category'     => 'Communication',
                'slug'         => 'ivr-system',
                'order'        => 10,
                'is_active'    => true,
            ],
            [
                'title'        => 'Bulk Email',
                'product_name' => 'bulk-email',
                'description'  => 'Professional bulk email marketing services for newsletters, promotions, and customer engagement campaigns with high deliverability rates.',
                'image'        => 'service-slider/bulkemail.webp',
                'image_440'    => 'service-slider/responsive/bulkemail-440.webp',
                'image_600'    => 'service-slider/responsive/bulkemail_600x800.webp',
                'image_1050'   => 'service-slider/responsive/bulkemail_1050x1400.webp',
                'image_1500'   => 'service-slider/responsive/bulkemail_1500x2000.webp',
                'icon'         => 'Mail',
                'category'     => 'Marketing',
                'slug'         => 'bulk-email',
                'order'        => 11,
                'is_active'    => true,
            ],
        ];

        foreach ($services as $data) {
            ServiceSlider::firstOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }

        $this->command->info('ServiceSliderSeeder: seeded ' . count($services) . ' service slider records.');
    }
}
