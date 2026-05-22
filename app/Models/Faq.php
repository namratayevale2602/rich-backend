<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'question', 'answer', 'product_name',
        'is_visible_home', 'order', 'is_active',
    ];

    protected $casts = [
        'is_active'      => 'boolean',
        'is_visible_home'=> 'boolean',
        'order'          => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}
