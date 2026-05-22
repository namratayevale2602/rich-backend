<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceWeOffer;
use Illuminate\Http\JsonResponse;

class ServiceWeOfferController extends Controller
{
    public function index(): JsonResponse
    {
        $services = ServiceWeOffer::active()->get()->map(fn ($s) => [
            'id'          => $s->id,
            'number'      => $s->number,
            'title'       => $s->title,
            'description' => $s->description,
            'image'       => $s->image_url,
            'srcset'      => $s->image_srcset,
            'gradient'    => $s->gradient,
            'icon'        => $s->icon,
            'features'    => collect($s->features)->pluck('item')->filter()->values(),
        ]);

        return response()->json(['success' => true, 'data' => $services]);
    }
}
