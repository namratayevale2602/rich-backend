<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CounterSeeder;
use Database\Seeders\ServiceSliderSeeder;
use Database\Seeders\ClientLogoSeeder;
use Database\Seeders\ServiceWeOfferSeeder;
use Database\Seeders\IndustrySeeder;
use Database\Seeders\OfferSectionSeeder;
use Database\Seeders\TestimonialSeeder;
use Database\Seeders\FaqSeeder;
use Database\Seeders\AboutHeroSeeder;
use Database\Seeders\AboutUsSectionSeeder;
use Database\Seeders\AboutKeySeeder;
use Database\Seeders\EnquiryFlexSeeder;
use Database\Seeders\ServiceSeeder;
use Database\Seeders\SoftwareItServiceSeeder;
use Database\Seeders\DigitalMarketingServiceSeeder;
use Database\Seeders\CareerContentSeeder;
use Database\Seeders\HowToGuideSeeder;
use Database\Seeders\FaqResourceSeeder;
use Database\Seeders\BlogSeeder;
use Database\Seeders\ContactSeeder;
use Database\Seeders\LegalSeeder;
use Database\Seeders\PageSeoSeeder;
use Database\Seeders\SeoKeywordSeeder;
use Database\Seeders\BannerSeeder;
use Database\Seeders\HeroSectionSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            BannerSeeder::class,
            HeroSectionSeeder::class,
            CounterSeeder::class,
            ServiceSliderSeeder::class,
            ClientLogoSeeder::class,
            ServiceWeOfferSeeder::class,
            IndustrySeeder::class,
            OfferSectionSeeder::class,
            TestimonialSeeder::class,
            FaqSeeder::class,
            AboutHeroSeeder::class,
            AboutUsSectionSeeder::class,
            AboutKeySeeder::class,
            EnquiryFlexSeeder::class,
            ServiceSeeder::class,
            SoftwareItServiceSeeder::class,
            DigitalMarketingServiceSeeder::class,
            CareerContentSeeder::class,
            HowToGuideSeeder::class,
            FaqResourceSeeder::class,
            BlogSeeder::class,
            ContactSeeder::class,
            LegalSeeder::class,
            PageSeoSeeder::class,
            SeoKeywordSeeder::class,
        ]);
    }
}
