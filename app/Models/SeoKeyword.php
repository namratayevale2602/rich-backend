<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoKeyword extends Model
{
    protected $fillable = ['group_id', 'keyword', 'order', 'is_active'];

    protected $casts = ['is_active' => 'boolean', 'order' => 'integer'];

    public function group()
    {
        return $this->belongsTo(SeoKeywordGroup::class, 'group_id');
    }
}
