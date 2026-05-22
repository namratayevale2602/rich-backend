<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use Illuminate\Http\JsonResponse;

class CounterController extends Controller
{
    /**
     * Get all active counter items
     */
    public function index(): JsonResponse
    {
        $counters = Counter::active()->get();

        $formattedCounters = $counters->map(function ($counter) {
            return [
                'id'           => $counter->id,
                'icon'         => $counter->icon_url,
                'icon_srcset'  => $counter->icon_srcset,
                'icon_sizes'   => $counter->icon_sizes ?: '64px',
                'number'       => $counter->number,
                'title_suffix' => $counter->title_suffix,
                'subtitle'     => $counter->subtitle,
                'order'        => $counter->order,
                'is_active'    => $counter->is_active,
            ];
        });

        return response()->json([
            'success' => true,
            'data'    => [
                'section_title'       => 'Facts & Figures',
                'section_description' => 'Understand the Powerful Insights and Metrics That Demonstrate Our Success and Future Potential',
                'items'               => $formattedCounters,
            ],
            'message' => 'Counters retrieved successfully',
        ]);
    }
}
