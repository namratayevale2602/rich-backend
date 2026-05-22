<?php

namespace Database\Seeders;

use App\Models\OfferSection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class OfferSectionSeeder extends Seeder
{
    public function run(): void
    {
        $src = base_path('../richsol/public/homeimg/integrations-video1.mp4');
        $dir = public_path('uploads/offer');
        File::ensureDirectoryExists($dir);

        $dest = $dir . '/integrations-video1.mp4';
        if (File::exists($src) && !File::exists($dest)) {
            File::copy($src, $dest);
        }

        OfferSection::firstOrCreate(
            ['title' => 'Get more out of Rich System Solution'],
            [
                'title'       => 'Get more out of Rich System Solution',
                'subtitle'    => 'Do more with the resources you already have.',
                'description' => 'Enhance your operations with Rich System Solution\'s powerful APIs and versatile plug-ins, enabling seamless automation across platforms. Our advanced services and solutions integrate effortlessly with a wide range of popular applications to streamline your business processes. Whether you\'re managing productivity with Zoho Applications, running e-commerce stores on WooCommerce or Shopify, or optimizing CRM workflows with Bitrix 24 and HubSpot, Rich System Solution has you covered',
                'button_text' => 'Contact us now',
                'button_link' => '/schedule-a-demo',
                'video'       => 'offer/integrations-video1.mp4',
                'is_active'   => true,
            ]
        );

        $this->command->info('OfferSectionSeeder: seeded offer section.');
    }
}
