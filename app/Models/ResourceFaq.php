<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceFaq extends Model
{
    use HasFactory;

    protected $table = 'resource_faqs';

    protected $fillable = ['faq_product_id', 'question', 'answer', 'order', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }

    public function product()
    {
        return $this->belongsTo(FaqProduct::class, 'faq_product_id');
    }
}
