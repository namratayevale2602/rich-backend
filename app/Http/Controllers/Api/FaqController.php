<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class FaqController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Faq::active();

        // Filter by product_name (subpage) or home-visible only
        if ($request->has('product')) {
            $query->where('product_name', $request->product);
        } elseif (!$request->has('all')) {
            $query->where('is_visible_home', true);
        }

        $faqs = $query->get()->map(fn ($f) => [
            'id'              => $f->id,
            'question'        => $f->question,
            'answer'          => $f->answer,
            'product_name'    => $f->product_name,
            'is_visible_home' => $f->is_visible_home,
        ]);

        return response()->json([
            'success' => true,
            'data'    => [
                'section_title'       => 'Frequently Asked Questions',
                'section_description' => 'Get answers to common questions about our comprehensive digital services and solutions',
                'items'               => $faqs,
            ],
        ]);
    }
}
