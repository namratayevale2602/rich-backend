<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClientLogo;
use Illuminate\Http\JsonResponse;

class ClientLogoController extends Controller
{
    public function index(): JsonResponse
    {
        $logos = ClientLogo::active()->get()->map(fn ($l) => [
            'id'         => $l->id,
            'name'       => $l->name,
            'logo'       => $l->logo_url,
            'logo_srcset'=> $l->logo_srcset,
            'logo_sizes' => $l->logo_sizes ?: '(max-width: 640px) 93px, 82px',
        ]);

        return response()->json(['success' => true, 'data' => $logos]);
    }
}
