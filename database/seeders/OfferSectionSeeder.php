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

        OfferSection::updateOrCreate(
            ['title' => 'Why 3,000+ Businesses Choose Rich System Solutions'],
            [
                'title'       => 'Why 3,000+ Businesses Choose Rich System Solutions',
                'subtitle'    => 'We have been operating since 2009 — that is 16 years of building technology for Indian businesses.',
                'description' => 'We know what works in Nashik. We know what works in Maharashtra. And we know what works at the national level when you are ready to scale. Meta Verified WhatsApp API for official, compliant, high-trust messaging. DLT-compliant bulk SMS platform with zero risk of message blocking or penalties. In-house team with no outsourcing — faster delivery, better quality control. Dedicated account manager — one call resolves everything. INR-friendly pricing for SMEs — no dollar billing surprises.',
                'button_text' => 'Get Free Consultation',
                'button_link' => '/contactus',
                'video'       => 'offer/integrations-video1.mp4',
                'is_active'   => true,
            ]
        );

        // Deactivate old record with previous title if it exists
        OfferSection::where('title', 'Get more out of Rich System Solution')->update(['is_active' => false]);

        $this->command->info('OfferSectionSeeder: seeded offer section.');
    }
}
