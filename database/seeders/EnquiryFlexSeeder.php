<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EnquiryFlex;

class EnquiryFlexSeeder extends Seeder
{
    public function run(): void
    {
        EnquiryFlex::create([
            'background'  => '#004ecc40',
            'title'       => 'LETS REACH OUT',
            'subtitle'    => 'Connect with us',
            'description' => 'Empower your business with cutting-edge conversational experiences through our robust infrastructure, designed to support you at any scale. With contextual campaigns, customizable workflows, and seamless cross-channel interactions, we help you engage your customers in meaningful and innovative ways. Whether it\'s personalizing customer journeys, streamlining communication processes, or creating impactful marketing campaigns, our solution ensures that your enterprise is equipped to deliver outstanding, scalable, and efficient customer experiences.',
            'image'       => null,
            'image_400'   => null,
            'image_800'   => null,
            'image_alt'   => 'offer',
            'buttons'     => [
                ['text' => 'Schedule a demo', 'link' => '/schedule-a-demo'],
                ['text' => 'Talk to Sales',   'link' => '/contactus'],
            ],
            'is_active' => true,
        ]);
    }
}
