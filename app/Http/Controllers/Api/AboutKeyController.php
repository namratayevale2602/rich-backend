<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AboutKey;
use Illuminate\Http\JsonResponse;

class AboutKeyController extends Controller
{
    public function index(): JsonResponse
    {
        $items = AboutKey::active()->get();

        $formatted = $items->map(fn ($item) => [
            'id'          => $item->id,
            'type'        => $item->type,
            'title'       => $item->title,
            'subtitle'    => $item->subtitle,
            'description' => $item->description,
            'image'       => [
                'src' => $item->image_url,
                'alt' => $item->title,
            ],
            'order'     => $item->order,
            'is_active' => $item->is_active,
        ]);

        return response()->json([
            'success' => true,
            'data'    => $formatted,
            'message' => 'About key sections retrieved successfully',
        ]);
    }
}
