<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EnquiryFlex;
use Illuminate\Http\JsonResponse;

class EnquiryFlexController extends Controller
{
    public function index(): JsonResponse
    {
        $section = EnquiryFlex::active()->first();

        if (!$section) {
            return response()->json([
                'success' => false,
                'message' => 'No active enquiry flex section found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'id'          => $section->id,
                'background'  => $section->background,
                'title'       => $section->title,
                'subtitle'    => $section->subtitle,
                'description' => $section->description,
                'image' => [
                    'src'    => $section->image_url,
                    'src400' => $section->image_400_url,
                    'src800' => $section->image_800_url,
                    'srcset' => $section->image_srcset,
                    'alt'    => $section->image_alt,
                ],
                'buttons'   => $section->buttons,
                'is_active' => $section->is_active,
            ],
            'message' => 'Enquiry flex section retrieved successfully',
        ]);
    }
}
