<?php

namespace Database\Seeders;

use App\Models\CareerIntro;
use App\Models\CareerPosition;
use Illuminate\Database\Seeder;

class CareerContentSeeder extends Seeder
{
    public function run(): void
    {
        // Career Intro
        CareerIntro::updateOrCreate(
            ['title' => 'Join Our Growing Team'],
            [
                'title'       => 'Join Our Growing Team',
                'description' => 'At Rich System Solutions, we believe in fostering talent and providing opportunities for growth. Join us in our mission to deliver exceptional digital solutions and build a rewarding career in the tech industry.',
                'image'       => null,
                'is_active'   => true,
            ]
        );

        // Job Positions
        $positions = [
            ['position' => 'Frontend Developer',         'experience' => '2-4', 'type' => 'Full-time', 'location' => 'Nashik', 'opening' => '3', 'order' => 1],
            ['position' => 'Digital Marketing Specialist', 'experience' => '1-3', 'type' => 'Full-time', 'location' => 'Nashik', 'opening' => '2', 'order' => 2],
            ['position' => 'Bulk SMS Executive',          'experience' => '0-1', 'type' => 'Full-time', 'location' => 'Nashik', 'opening' => '5', 'order' => 3],
            ['position' => 'UI/UX Designer',              'experience' => '2-5', 'type' => 'Full-time', 'location' => 'Remote', 'opening' => '2', 'order' => 4],
            ['position' => 'Sales Executive',             'experience' => '1-2', 'type' => 'Full-time', 'location' => 'Nashik', 'opening' => '4', 'order' => 5],
            ['position' => 'PHP Developer',               'experience' => '3-5', 'type' => 'Full-time', 'location' => 'Nashik', 'opening' => '3', 'order' => 6],
        ];

        foreach ($positions as $data) {
            CareerPosition::updateOrCreate(
                ['position' => $data['position']],
                array_merge($data, ['is_active' => true])
            );
        }
    }
}
