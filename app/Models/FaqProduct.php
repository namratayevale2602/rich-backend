<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqProduct extends Model
{
    use HasFactory;

    protected $table = 'faq_products';

    protected $fillable = ['title', 'order', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }

    public function faqs()
    {
        return $this->hasMany(ResourceFaq::class, 'faq_product_id');
    }
}
