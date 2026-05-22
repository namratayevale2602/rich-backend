<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSeo extends Model
{
    protected $fillable = [
        'group',
        'group_label',
        'page_key',
        'label',
        'title',
        'description',
        'keywords',
        'h1',
        'canonical',
        'og_image',
        'breadcrumb',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order'     => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
