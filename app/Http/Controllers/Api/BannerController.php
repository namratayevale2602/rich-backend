<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\JsonResponse;

class BannerController extends Controller
{
    /**
     * Get all active banners
     */
    public function index(): JsonResponse
    {
        $banners = Banner::active()->get();
        
        // Format banner data for API response
        $formattedBanners = $banners->map(function ($banner) {
            return [
                'id' => $banner->id,
                'title' => $banner->title,
                'subtitle' => $banner->subtitle,
                'images' => [
                    'desktop' => [
                        'src' => $banner->desktop_image_url,
                        'alt' => $banner->title
                    ],
                    'mobile' => [
                        'src' => $banner->mobile_image_url,
                        'srcset' => $banner->mobile_srcset,
                        'alt' => $banner->title
                    ]
                ],
                'cta' => [
                    'primary' => [
                        'text' => $banner->cta_text ?? 'Get Started',
                        'link' => $banner->cta_link ?? '/contactus'
                    ],
                    'secondary' => [
                        'text' => $banner->cta_secondary_text ?? 'Know Us',
                        'link' => $banner->cta_secondary_link ?? '/about'
                    ]
                ],
                'order' => $banner->order,
                'is_active' => $banner->is_active
            ];
        });
        
        return response()->json([
            'success' => true,
            'data' => $formattedBanners,
            'message' => 'Banners retrieved successfully'
        ]);
    }
    
    /**
     * Get single banner by ID
     */
    public function show($id): JsonResponse
    {
        $banner = Banner::active()->find($id);
        
        if (!$banner) {
            return response()->json([
                'success' => false,
                'message' => 'Banner not found'
            ], 404);
        }
        
        return response()->json([
            'success' => true,
            'data' => [
                'id' => $banner->id,
                'title' => $banner->title,
                'subtitle' => $banner->subtitle,
                'images' => [
                    'desktop' => [
                        'src' => $banner->desktop_image_url,
                        'alt' => $banner->title
                    ],
                    'mobile' => [
                        'src' => $banner->mobile_image_url,
                        'srcset' => $banner->mobile_srcset,
                        'alt' => $banner->title
                    ]
                ],
                'cta' => [
                    'primary' => [
                        'text' => $banner->cta_text ?? 'Get Started',
                        'link' => $banner->cta_link ?? '/contactus'
                    ],
                    'secondary' => [
                        'text' => $banner->cta_secondary_text ?? 'Know Us',
                        'link' => $banner->cta_secondary_link ?? '/about'
                    ]
                ]
            ],
            'message' => 'Banner retrieved successfully'
        ]);
    }
}