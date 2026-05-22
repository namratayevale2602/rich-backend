<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceSlider;
use Illuminate\Http\JsonResponse;

class ServiceSliderController extends Controller
{
    /**
     * Get all active service slider items
     */
    public function index(): JsonResponse
    {
        $services = ServiceSlider::active()->get();

        $formattedServices = $services->map(function ($service) {
            return [
                'id'           => $service->id,
                'title'        => $service->title,
                'product_name' => $service->product_name,
                'description'  => $service->description,
                'image'        => $service->image_url,
                'srcset'       => $service->srcset,
                'icon'         => $service->icon,
                'category'     => $service->category,
                'slug'         => $service->slug,
                'order'        => $service->order,
                'is_active'    => $service->is_active,
            ];
        });

        return response()->json([
            'success' => true,
            'data'    => $formattedServices,
            'message' => 'Service sliders retrieved successfully',
        ]);
    }

    /**
     * Get a single service slider item by ID
     */
    public function show($id): JsonResponse
    {
        $service = ServiceSlider::active()->find($id);

        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => 'Service not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => [
                'id'           => $service->id,
                'title'        => $service->title,
                'product_name' => $service->product_name,
                'description'  => $service->description,
                'image'        => $service->image_url,
                'srcset'       => $service->srcset,
                'icon'         => $service->icon,
                'category'     => $service->category,
                'slug'         => $service->slug,
            ],
            'message' => 'Service retrieved successfully',
        ]);
    }
}
