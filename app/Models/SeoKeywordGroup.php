<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoKeywordGroup extends Model
{
    protected $fillable = ['group_key', 'label', 'description', 'is_active', 'order'];

    protected $casts = ['is_active' => 'boolean', 'order' => 'integer'];

    public function keywords()
    {
        return $this->hasMany(SeoKeyword::class, 'group_id')->orderBy('order');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
