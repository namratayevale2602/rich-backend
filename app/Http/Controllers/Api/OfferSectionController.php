<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OfferSection;
use Illuminate\Http\JsonResponse;

class OfferSectionController extends Controller
{
    public function index(): JsonResponse
    {
        $offer = OfferSection::active()->first();

        if (!$offer) {
            return response()->json(['success' => false, 'message' => 'No active offer section found'], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => [
                'id'          => $offer->id,
                'title'       => $offer->title,
                'subtitle'    => $offer->subtitle,
                'description' => $offer->description,
                'button'      => ['text' => $offer->button_text, 'link' => $offer->button_link],
                'video'       => $offer->video_url,
            ],
        ]);
    }
}
