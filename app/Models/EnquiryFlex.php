<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EnquiryFlex extends Model
{
    use HasFactory;

    protected $table = 'enquiry_flex';

    protected $fillable = [
        'background',
        'title',
        'subtitle',
        'description',
        'image',
        'image_400',
        'image_800',
        'image_alt',
        'buttons',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'buttons'   => 'array',
    ];

    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('uploads/' . $this->image) : null;
    }

    public function getImage400UrlAttribute(): ?string
    {
        return $this->image_400 ? asset('uploads/' . $this->image_400) : null;
    }

    public function getImage800UrlAttribute(): ?string
    {
        return $this->image_800 ? asset('uploads/' . $this->image_800) : null;
    }

    public function getImageSrcsetAttribute(): string
    {
        $srcset = [];
        if ($this->image_400) {
            $srcset[] = asset('uploads/' . $this->image_400) . ' 400w';
        }
        if ($this->image_800) {
            $srcset[] = asset('uploads/' . $this->image_800) . ' 800w';
        }
        return implode(', ', $srcset);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->latest();
    }
}
