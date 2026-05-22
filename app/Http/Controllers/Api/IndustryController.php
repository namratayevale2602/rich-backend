<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\JsonResponse;

class IndustryController extends Controller
{
    public function index(): JsonResponse
    {
        $industries = Industry::active()->get()->map(fn ($i) => [
            'id'          => $i->id,
            'title'       => $i->title,
            'image'       => $i->image_url,
            'srcset'      => $i->image_srcset,
            'bg_color'    => $i->bg_color,
            'accent_color'=> $i->accent_color,
            'path'        => $i->path,
        ]);

        return response()->json(['success' => true, 'data' => $industries]);
    }
}
