<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use App\Models\ContactPhone;

class ContactInfoController extends Controller
{
    public function index()
    {
        $info   = ContactInfo::active()->first();
        $phones = ContactPhone::active()->get();

        return response()->json([
            'success' => true,
            'data'    => [
                'address'        => $info?->address,
                'facebook_url'   => $info?->facebook_url,
                'linkedin_url'   => $info?->linkedin_url,
                'youtube_url'    => $info?->youtube_url,
                'instagram_url'  => $info?->instagram_url,
                'email'          => $info?->email,
                'working_days'   => $info?->working_days,
                'working_hours'  => $info?->working_hours,
                'map_embed_url'  => $info?->map_embed_url,
                'support_phones' => $phones->where('type', 'support')->pluck('phone')->values(),
                'sales_phones'   => $phones->where('type', 'sales')->pluck('phone')->values(),
            ],
        ]);
    }
}
