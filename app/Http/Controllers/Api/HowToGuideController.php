<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HowToGuideIntro;
use App\Models\HowToGuideMagazine;
use App\Models\HowToGuideSample;

class HowToGuideController extends Controller
{
    public function getIntro()
    {
        $intro = HowToGuideIntro::active()->first();

        return response()->json([
            'success' => true,
            'data'    => $intro ? ['introduction' => $intro->introduction] : null,
        ]);
    }

    public function getMagazines()
    {
        $magazines = HowToGuideMagazine::active()->orderBy('order')->get()->map(fn($m) => [
            'id'          => $m->id,
            'title'       => $m->title,
            'subtitle'    => $m->subtitle,
            'description' => $m->description,
            'document'    => $m->document_url,
            'image'       => $m->image_url,
        ]);

        return response()->json(['success' => true, 'data' => $magazines]);
    }

    public function getSamples()
    {
        $samples = HowToGuideSample::active()->orderBy('order')->get()->map(fn($s) => [
            'id'          => $s->id,
            'title'       => $s->title,
            'description' => $s->description,
            'link'        => $s->document_url,
        ]);

        return response()->json(['success' => true, 'data' => $samples]);
    }
}
