<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PageSeo;

class PageSeoController extends Controller
{
    public function index()
    {
        $seos = PageSeo::active()->orderBy('group')->orderBy('order')->get();

        $data = $seos->keyBy('page_key')->map(fn($s) => $this->format($s));

        return response()->json(['success' => true, 'data' => $data]);
    }

    public function show($pageKey)
    {
        $seo = PageSeo::active()->where('page_key', $pageKey)->first();

        if (!$seo) {
            return response()->json(['success' => false, 'message' => 'Not found'], 404);
        }

        return response()->json(['success' => true, 'data' => $this->format($seo)]);
    }

    private function format(PageSeo $s): array
    {
        return [
            'page_key'   => $s->page_key,
            'group'      => $s->group,
            'label'      => $s->label,
            'title'      => $s->title,
            'description'=> $s->description,
            'keywords'   => $s->keywords,
            'h1'         => $s->h1,
            'canonical'  => $s->canonical,
            'og_image'   => $s->og_image,
            'breadcrumb' => $s->breadcrumb,
        ];
    }
}
