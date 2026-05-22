<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DigitalMarketingService;

class DigitalMarketingServiceController extends Controller
{
    public function index()
    {
        $services = DigitalMarketingService::active()->with('features')->orderBy('order')->get();

        return response()->json([
            'success' => true,
            'data'    => $services->map(fn($s) => [
                'id'    => $s->id,
                'slug'  => $s->slug,
                'label' => $s->label,
                'hero'  => [
                    'title'       => $s->hero_title,
                    'description' => $s->hero_description,
                    'features'    => $s->features->pluck('feature')->values(),
                ],
            ]),
        ]);
    }

    public function show($slug)
    {
        $service = DigitalMarketingService::active()
            ->with(['features', 'deliverMetrics', 'solutions', 'strategies', 'processSteps', 'benefits'])
            ->where('slug', $slug)
            ->first();

        if (!$service) {
            return response()->json(['success' => false, 'message' => 'Not found'], 404);
        }

        $whatWeDeliver = null;
        if ($service->deliver_title || $service->deliverMetrics->isNotEmpty() || !empty($service->deliver_approach)) {
            $whatWeDeliver = [
                'title'       => $service->deliver_title,
                'description' => $service->deliver_description,
                'approach'    => collect($service->deliver_approach ?? [])->pluck('item')->values(),
                'metrics'     => $service->deliverMetrics->map(fn($m) => [
                    'label' => $m->label,
                    'value' => $m->value,
                ]),
            ];
        }

        $solutions = $service->solutions->isNotEmpty()
            ? $service->solutions->map(fn($s) => [
                'title'       => $s->title,
                'description' => $s->description,
                'features'    => collect($s->features ?? [])->pluck('item')->values(),
            ])
            : null;

        $strategies = null;
        if ($service->strategies_title || $service->strategies->isNotEmpty()) {
            $strategies = [
                'title'       => $service->strategies_title,
                'description' => $service->strategies_description,
                'items'       => $service->strategies->map(fn($s) => [
                    'title'       => $s->title,
                    'description' => $s->description,
                    'tactics'     => collect($s->tactics ?? [])->pluck('item')->values(),
                ]),
            ];
        }

        $process = null;
        if ($service->process_title || $service->processSteps->isNotEmpty()) {
            $process = [
                'title'       => $service->process_title,
                'description' => $service->process_description,
                'steps'       => $service->processSteps->map(fn($s) => [
                    'title'       => $s->title,
                    'description' => $s->description,
                    'activities'  => collect($s->activities ?? [])->pluck('item')->values(),
                ]),
            ];
        }

        $benefits = null;
        if ($service->benefits_title || $service->benefits->isNotEmpty()) {
            $benefits = [
                'title'       => $service->benefits_title,
                'description' => $service->benefits_description,
                'points'      => $service->benefits->map(fn($b) => [
                    'title'       => $b->title,
                    'description' => $b->description,
                ]),
            ];
        }

        return response()->json([
            'success' => true,
            'data'    => [
                'id'            => $service->id,
                'slug'          => $service->slug,
                'label'         => $service->label,
                'hero'          => [
                    'title'       => $service->hero_title,
                    'description' => $service->hero_description,
                    'features'    => $service->features->pluck('feature')->values(),
                ],
                'whatWeDeliver' => $whatWeDeliver,
                'solutions'     => $solutions,
                'strategies'    => $strategies,
                'process'       => $process,
                'benefits'      => $benefits,
            ],
        ]);
    }
}
