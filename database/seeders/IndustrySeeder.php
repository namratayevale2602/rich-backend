<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class IndustrySeeder extends Seeder
{
    public function run(): void
    {
        $src  = base_path('../richsol/public/element');
        $main = public_path('uploads/industries');
        $resp = public_path('uploads/industries/responsive');
        File::ensureDirectoryExists($main);
        File::ensureDirectoryExists($resp);

        $files = [
            'element5.webp'     => $main . '/element5.webp',
            'element5-440.webp' => $resp . '/element5-440.webp',
            'element5-660.webp' => $resp . '/element5-660.webp',
            'element.webp'      => $main . '/element.webp',
            'element-400.webp'  => $resp . '/element-400.webp',
            'element-700.webp'  => $resp . '/element-700.webp',
            'element1.webp'     => $main . '/element1.webp',
            'element1-440.webp' => $resp . '/element1-440.webp',
            'element1-660.webp' => $resp . '/element1-660.webp',
            'element2.webp'     => $main . '/element2.webp',
            'element2-440.webp' => $resp . '/element2-440.webp',
            'element2-660.webp' => $resp . '/element2-660.webp',
            'element3.webp'     => $main . '/element3.webp',
            'element3-440.webp' => $resp . '/element3-440.webp',
            'element3-700.webp' => $resp . '/element3-700.webp',
            'element4.webp'     => $main . '/element4.webp',
            'element4-440.webp' => $resp . '/element4-440.webp',
            'element4-700.webp' => $resp . '/element4-700.webp',
            'apiintegration.webp'     => $main . '/apiintegration.webp',
            'apiintegration-440.webp' => $resp . '/apiintegration-440.webp',
            'apiintegration-700.webp' => $resp . '/apiintegration-700.webp',
            'maintenance.webp'        => $main . '/maintenance.webp',
            'maintenance-440.webp'    => $resp . '/maintenance-440.webp',
            'maintenance-700.webp'    => $resp . '/maintenance-700.webp',
        ];
        foreach ($files as $f => $d) {
            $s = $src . DIRECTORY_SEPARATOR . $f;
            if (File::exists($s) && !File::exists($d)) File::copy($s, $d);
        }

        $industries = [
            ['title' => 'Custom Software Development', 'image' => 'industries/element5.webp', 'image_440' => 'industries/responsive/element5-440.webp', 'image_700' => 'industries/responsive/element5-660.webp', 'bg_color' => 'bg-gradient-to-br from-blue-50 to-blue-100',   'accent_color' => 'from-blue-500 to-blue-600',   'path' => '/software-it-services/custom-software-development', 'order' => 1, 'is_active' => true],
            ['title' => 'Web Development',              'image' => 'industries/element.webp',  'image_440' => 'industries/responsive/element-400.webp',  'image_700' => 'industries/responsive/element-700.webp',  'bg_color' => 'bg-gradient-to-br from-emerald-50 to-emerald-100', 'accent_color' => 'from-emerald-500 to-emerald-600', 'path' => '/software-it-services/web-development', 'order' => 2, 'is_active' => true],
            ['title' => 'Mobile App Development',       'image' => 'industries/element1.webp', 'image_440' => 'industries/responsive/element1-440.webp', 'image_700' => 'industries/responsive/element1-660.webp', 'bg_color' => 'bg-gradient-to-br from-teal-50 to-teal-100',     'accent_color' => 'from-teal-500 to-teal-600',   'path' => '/software-it-services/mobile-app-development', 'order' => 3, 'is_active' => true],
            ['title' => 'UI/UX Design',                 'image' => 'industries/element2.webp', 'image_440' => 'industries/responsive/element2-440.webp', 'image_700' => 'industries/responsive/element2-660.webp', 'bg_color' => 'bg-gradient-to-br from-purple-50 to-purple-100',  'accent_color' => 'from-purple-500 to-purple-600', 'path' => '/software-it-services/ui-ux-design', 'order' => 4, 'is_active' => true],
            ['title' => 'E-Commerce Solutions',         'image' => 'industries/element3.webp', 'image_440' => 'industries/responsive/element3-440.webp', 'image_700' => 'industries/responsive/element3-700.webp', 'bg_color' => 'bg-gradient-to-br from-amber-50 to-amber-100',   'accent_color' => 'from-amber-500 to-amber-600',  'path' => '/software-it-services/ecommerce-solutions', 'order' => 5, 'is_active' => true],
            ['title' => 'Cloud Solutions',              'image' => 'industries/element4.webp', 'image_440' => 'industries/responsive/element4-440.webp', 'image_700' => 'industries/responsive/element4-700.webp', 'bg_color' => 'bg-gradient-to-br from-cyan-50 to-cyan-100',     'accent_color' => 'from-cyan-500 to-cyan-600',    'path' => '/software-it-services/cloud-solutions', 'order' => 6, 'is_active' => true],
            ['title' => 'API Integration',              'image' => 'industries/apiintegration.webp', 'image_440' => 'industries/responsive/apiintegration-440.webp', 'image_700' => 'industries/responsive/apiintegration-700.webp', 'bg_color' => 'bg-gradient-to-br from-pink-50 to-pink-100', 'accent_color' => 'from-pink-500 to-pink-600', 'path' => '/software-it-services/api-integration', 'order' => 7, 'is_active' => true],
            ['title' => 'Maintenance and Technical Support', 'image' => 'industries/maintenance.webp', 'image_440' => 'industries/responsive/maintenance-440.webp', 'image_700' => 'industries/responsive/maintenance-700.webp', 'bg_color' => 'bg-gradient-to-br from-orange-50 to-orange-100', 'accent_color' => 'from-orange-500 to-orange-600', 'path' => '/software-it-services/maintenance-support', 'order' => 8, 'is_active' => true],
        ];

        foreach ($industries as $data) {
            Industry::firstOrCreate(['path' => $data['path']], $data);
        }

        $this->command->info('IndustrySeeder: seeded ' . count($industries) . ' industries.');
    }
}
