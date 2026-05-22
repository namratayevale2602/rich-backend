<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceFaq;
use Illuminate\Http\JsonResponse;

class ServiceController extends Controller
{
    public function index(): JsonResponse
    {
        $services = Service::active()->get();

        $data = $services->map(fn ($s) => [
            'id'          => $s->id,
            'slug'        => $s->slug,
            'title'       => $s->title,
            'subtitle'    => $s->subtitle,
            'description' => $s->full_desc,
            'image'       => [
                'src' => $s->image_url,
                'alt' => $s->title,
            ],
        ]);

        return response()->json([
            'success' => true,
            'data'    => $data,
            'message' => 'Services retrieved successfully',
        ]);
    }

    public function show(string $slug): JsonResponse
    {
        $service = Service::with(['subtypes', 'benefits', 'caseStudies', 'faqs'])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->first();

        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => 'Service not found',
            ], 404);
        }

        // General FAQs (not tied to any service)
        $generalFaqs = ServiceFaq::whereNull('service_id')
            ->where('is_general', true)
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        return response()->json([
            'success' => true,
            'data'    => [
                'id'           => $service->id,
                'slug'         => $service->slug,
                'title'        => $service->title,
                'subtitle'     => $service->subtitle,
                'full_desc'    => $service->full_desc,
                'detailed_desc'=> $service->detailed_desc,
                'image'        => [
                    'src' => $service->image_url,
                    'alt' => $service->title,
                ],
                'subtypes' => $service->subtypes->map(fn ($st) => [
                    'id'          => $st->id,
                    'title'       => $st->title,
                    'description' => $st->description,
                    'image'       => ['src' => $st->image_url, 'alt' => $st->title],
                ]),
                'benefits' => $service->benefits->map(fn ($b) => [
                    'id'          => $b->id,
                    'title'       => $b->title,
                    'subtitle'    => $b->subtitle,
                    'description' => $b->description,
                    'image'       => ['src' => $b->image_url, 'alt' => $b->title],
                    'list'        => $b->list ?? [],
                ]),
                'case_studies' => $service->caseStudies->map(fn ($cs) => [
                    'id'       => $cs->id,
                    'title'    => $cs->title,
                    'industry' => $cs->industry,
                    'image'    => ['src' => $cs->image_url, 'alt' => $cs->title],
                ]),
                'faqs' => [
                    'service_faqs' => $service->faqs->map(fn ($f) => [
                        'id'       => $f->id,
                        'question' => $f->question,
                        'answer'   => $f->answer,
                    ]),
                    'general_faqs' => $generalFaqs->map(fn ($f) => [
                        'id'       => $f->id,
                        'question' => $f->question,
                        'answer'   => $f->answer,
                    ]),
                ],
            ],
            'message' => 'Service retrieved successfully',
        ]);
    }
}
