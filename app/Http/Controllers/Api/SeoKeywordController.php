<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SeoKeywordGroup;

class SeoKeywordController extends Controller
{
    public function index()
    {
        $groups = SeoKeywordGroup::active()
            ->with(['keywords' => fn($q) => $q->where('is_active', true)->orderBy('order')])
            ->orderBy('order')
            ->get();

        $data = $groups->keyBy('group_key')->map(fn($g) => [
            'group_key'   => $g->group_key,
            'label'       => $g->label,
            'description' => $g->description,
            'keywords'    => $g->keywords->pluck('keyword')->values(),
        ]);

        return response()->json(['success' => true, 'data' => $data]);
    }

    public function show($groupKey)
    {
        $group = SeoKeywordGroup::active()
            ->with(['keywords' => fn($q) => $q->where('is_active', true)->orderBy('order')])
            ->where('group_key', $groupKey)
            ->first();

        if (!$group) {
            return response()->json(['success' => false, 'message' => 'Not found'], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => [
                'group_key'   => $group->group_key,
                'label'       => $group->label,
                'description' => $group->description,
                'keywords'    => $group->keywords->pluck('keyword')->values(),
            ],
        ]);
    }
}
