<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AboutHero;
use Illuminate\Http\JsonResponse;

class AboutHeroController extends Controller
{
    public function index(): JsonResponse
    {
        $aboutHero = AboutHero::active()->first();

        if (!$aboutHero) {
            return response()->json([
                'success' => false,
                'message' => 'No active about hero found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'id'          => $aboutHero->id,
                'heading'     => $aboutHero->heading,
                'subtitle'    => $aboutHero->subtitle,
                'description' => $aboutHero->description,
                'image'       => [
                    'src' => $aboutHero->image_url,
                    'alt' => $aboutHero->heading,
                ],
                'is_active' => $aboutHero->is_active,
            ],
            'message' => 'About hero retrieved successfully',
        ]);
    }
}
