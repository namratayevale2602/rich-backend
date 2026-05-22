<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AboutUsSection;
use Illuminate\Http\JsonResponse;

class AboutUsSectionController extends Controller
{
    public function index(): JsonResponse
    {
        $aboutUs = AboutUsSection::active()->first();

        if (!$aboutUs) {
            return response()->json([
                'success' => false,
                'message' => 'No active about us section found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'id'         => $aboutUs->id,
                'label'      => $aboutUs->label,
                'title'      => $aboutUs->title,
                'paragraphs' => $aboutUs->paragraphs,
                'image'      => [
                    'src' => $aboutUs->image_url,
                    'alt' => $aboutUs->title,
                ],
                'is_active'  => $aboutUs->is_active,
            ],
            'message' => 'About us section retrieved successfully',
        ]);
    }
}
