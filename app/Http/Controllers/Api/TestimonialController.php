<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\JsonResponse;

class TestimonialController extends Controller
{
    public function index(): JsonResponse
    {
        $testimonials = Testimonial::active()->get()->map(fn ($t) => [
            'id'       => $t->id,
            'username' => $t->username,
            'quotes'   => $t->quote,
        ]);

        return response()->json([
            'success' => true,
            'data'    => [
                'section_title' => 'What Our Customers Are Saying',
                'items'         => $testimonials,
            ],
        ]);
    }
}
