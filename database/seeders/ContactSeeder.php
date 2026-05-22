<?php

namespace Database\Seeders;

use App\Models\ContactInfo;
use App\Models\ContactPhone;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        ContactInfo::updateOrCreate(
            ['id' => 1],
            [
                'address'       => '4th Floor, Akravi Disha, 401, opposite Hotel City Pride, Tilakwadi, Nashik, Maharashtra 422002.',
                'facebook_url'  => 'https://facebook.com/richsystems',
                'linkedin_url'  => 'https://linkedin.com/company/richsystems',
                'youtube_url'   => 'https://www.youtube.com/@RICHSystemSolutions',
                'instagram_url' => 'https://instagram.com/richsystems',
                'email'         => 'support@richsol.com',
                'working_days'  => 'Monday - Saturday',
                'working_hours' => '9:30am - 6:30pm',
                'map_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3749.242272312533!2d73.77775407427671!3d19.998344022372525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddeb084d22ff73%3A0xe3e70a169bf7cb1b!2sRICH%20System%20Solutions%20Pvt.%20Ltd.%20%7C%20Digital%20Marketing%20%7C%20Bulk%20SMS%20%7C%20Website%20Development!5e0!3m2!1sen!2sin!4v1725346020421!5m2!1sen!2sin',
                'is_active'     => true,
            ]
        );

        $phones = [
            ['type' => 'support', 'phone' => '9595902003', 'order' => 1],
            ['type' => 'support', 'phone' => '9595902006', 'order' => 2],
            ['type' => 'sales',   'phone' => '9765432109', 'order' => 1],
            ['type' => 'sales',   'phone' => '9345678901', 'order' => 2],
        ];

        foreach ($phones as $data) {
            ContactPhone::updateOrCreate(
                ['type' => $data['type'], 'phone' => $data['phone']],
                array_merge($data, ['is_active' => true])
            );
        }
    }
}
