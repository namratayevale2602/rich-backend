<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FaqProduct;
use App\Models\ResourceFaq;

class FaqResourceController extends Controller
{
    public function getProducts()
    {
        $products = FaqProduct::active()->get(['id', 'title']);

        return response()->json(['success' => true, 'data' => $products]);
    }

    public function getQuestions()
    {
        $questions = ResourceFaq::active()->get()->map(fn($f) => [
            'id'         => $f->id,
            'product_id' => $f->faq_product_id,
            'question'   => $f->question,
            'answer'     => $f->answer,
        ]);

        return response()->json(['success' => true, 'data' => $questions]);
    }
}
