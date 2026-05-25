<?php

namespace Database\Seeders;

use App\Models\Counter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CounterSeeder extends Seeder
{
    /**
     * Copies icon images from the Next.js public folder to
     * public/uploads/counter/ and seeds all counter records.
     */
    public function run(): void
    {
        // Source: Next.js frontend public folder (sibling project)
        $frontendPublic = base_path('../richsol/public/homeimg');

        // Destination: Laravel uploads folder
        $uploadDir = public_path('uploads/counter');
        File::ensureDirectoryExists($uploadDir);

        // Map: seeder filename => source filename in homeimg/
        $iconsToCopy = [
            'troffe.webp'        => 'troffe.webp',
            'user_112x112.webp'  => 'user_112x112.webp',
            'user_224x224.webp'  => 'user_224x224.webp',
            'graph.webp'         => 'graph.webp',
            'clock.webp'         => 'clock.webp',
        ];

        foreach ($iconsToCopy as $destName => $srcName) {
            $src  = $frontendPublic . DIRECTORY_SEPARATOR . $srcName;
            $dest = $uploadDir . DIRECTORY_SEPARATOR . $destName;

            if (File::exists($src) && !File::exists($dest)) {
                File::copy($src, $dest);
            }
        }

        // Seed counter records (matches static factsData in Counter.jsx)
        $counters = [
            [
                'icon'         => 'counter/troffe.webp',
                'icon_2x'      => null,
                'icon_sizes'   => '64px',
                'number'       => 16,
                'title_suffix' => '+',
                'subtitle'     => 'Years of Proven Experience',
                'order'        => 1,
                'is_active'    => true,
            ],
            [
                'icon'         => 'counter/user_112x112.webp',
                'icon_2x'      => 'counter/user_224x224.webp',
                'icon_sizes'   => '(max-width: 640px) 112px, 64px',
                'number'       => 3000,
                'title_suffix' => '+',
                'subtitle'     => 'Satisfied Clients',
                'order'        => 2,
                'is_active'    => true,
            ],
            [
                'icon'         => 'counter/graph.webp',
                'icon_2x'      => null,
                'icon_sizes'   => '64px',
                'number'       => 10,
                'title_suffix' => 'Million +',
                'subtitle'     => 'SMS Delivered Per Year',
                'order'        => 3,
                'is_active'    => true,
            ],
            [
                'icon'         => 'counter/clock.webp',
                'icon_2x'      => null,
                'icon_sizes'   => '64px',
                'number'       => 99,
                'title_suffix' => '%',
                'subtitle'     => 'SMS Delivery Rate',
                'order'        => 4,
                'is_active'    => true,
            ],
        ];

        foreach ($counters as $data) {
            Counter::updateOrCreate(
                ['order' => $data['order']],
                $data
            );
        }

        $this->command->info('CounterSeeder: seeded ' . count($counters) . ' counter records.');
    }
}
