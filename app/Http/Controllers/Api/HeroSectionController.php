<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\JsonResponse;

class HeroSectionController extends Controller
{
    /**
     * Get active hero section
     */
    public function index(): JsonResponse
    {
        $hero = HeroSection::active()->first();
        
        if (!$hero) {
            return response()->json([
                'success' => false,
                'message' => 'No active hero section found'
            ], 404);
        }
        
        // Format hero data for API response
        $formattedHero = [
            'id' => $hero->id,
            'title' => $hero->title,
            'subtitle' => $hero->subtitle,
            'images' => [
                'hero' => [
                    'src' => $hero->hero_image_url,
                    'srcset' => $hero->hero_srcset,
                    'alt' => $hero->title
                ]
            ],
            'cta' => [
                'primary' => [
                    'text' => $hero->cta_text ?? 'Book Consultation',
                    'link' => $hero->cta_link ?? '/contactus'
                ],
                'secondary' => [
                    'text' => $hero->cta_secondary_text ?? 'About Us',
                    'link' => $hero->cta_secondary_link ?? '/about'
                ]
            ],
            'stats' => $hero->stats ?? [],
            'is_active' => $hero->is_active
        ];
        
        return response()->json([
            'success' => true,
            'data' => $formattedHero,
            'message' => 'Hero section retrieved successfully'
        ]);
    }
}