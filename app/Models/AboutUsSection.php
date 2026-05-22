<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutUsSection extends Model
{
    use HasFactory;

    protected $table = 'about_us_sections';

    protected $fillable = [
        'label',
        'title',
        'paragraphs',
        'image',
        'is_active',
    ];

    protected $casts = [
        'is_active'  => 'boolean',
        'paragraphs' => 'array',
    ];

    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('uploads/' . $this->image) : null;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->latest();
    }
}
