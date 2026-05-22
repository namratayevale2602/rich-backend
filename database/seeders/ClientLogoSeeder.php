<?php

namespace Database\Seeders;

use App\Models\ClientLogo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ClientLogoSeeder extends Seeder
{
    public function run(): void
    {
        $src = base_path('../richsol/public/trustedclient');
        $dir = public_path('uploads/trusted-client');
        File::ensureDirectoryExists($dir);

        $copy = [
            'trusted.webp'       => $dir . '/trusted.webp',
            'trusted_186x106.webp' => $dir . '/trusted_186x106.webp',
            'trusted1.webp'      => $dir . '/trusted1.webp',
            'trusted1_106x106.webp' => $dir . '/trusted1_106x106.webp',
        ];
        foreach ($copy as $file => $dest) {
            $s = $src . DIRECTORY_SEPARATOR . $file;
            if (File::exists($s) && !File::exists($dest)) File::copy($s, $dest);
        }

        $logos = [
            [
                'name'       => 'Rich System Solution - Logo',
                'logo'       => 'trusted-client/trusted.webp',
                'logo_2x'    => 'trusted-client/trusted_186x106.webp',
                'logo_sizes' => '(max-width: 640px) 93px, 82px',
                'order'      => 1, 'is_active' => true,
            ],
            [
                'name'       => 'Trusted Client',
                'logo'       => 'trusted-client/trusted1.webp',
                'logo_2x'    => 'trusted-client/trusted1_106x106.webp',
                'logo_sizes' => '(max-width: 640px) 53px, 46px',
                'order'      => 2, 'is_active' => true,
            ],
        ];

        foreach ($logos as $data) {
            ClientLogo::firstOrCreate(['name' => $data['name']], $data);
        }

        $this->command->info('ClientLogoSeeder: seeded ' . count($logos) . ' logos.');
    }
}
