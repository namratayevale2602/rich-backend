<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HeroSection extends Model
{
    use HasFactory;

    protected $table = 'hero_sections';

    protected $fillable = [
        'title',
        'subtitle',
        'hero_image',
        'hero_image_400',
        'hero_image_500',
        'hero_image_600',
        'hero_image_700',
        'hero_image_800',
        'hero_image_1000',
        'hero_image_1500',
        'cta_text',
        'cta_link',
        'cta_secondary_text',
        'cta_secondary_link',
        'stats',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'stats' => 'array',
    ];

    // Accessors for full image URLs
    public function getHeroImageUrlAttribute(): ?string
    {
        return $this->hero_image ? asset('uploads/' . $this->hero_image) : null;
    }

    public function getHeroImage400UrlAttribute(): ?string
    {
        return $this->hero_image_400 ? asset('uploads/' . $this->hero_image_400) : null;
    }

    public function getHeroImage500UrlAttribute(): ?string
    {
        return $this->hero_image_500 ? asset('uploads/' . $this->hero_image_500) : null;
    }

    public function getHeroImage600UrlAttribute(): ?string
    {
        return $this->hero_image_600 ? asset('uploads/' . $this->hero_image_600) : null;
    }

    public function getHeroImage700UrlAttribute(): ?string
    {
        return $this->hero_image_700 ? asset('uploads/' . $this->hero_image_700) : null;
    }

    public function getHeroImage800UrlAttribute(): ?string
    {
        return $this->hero_image_800 ? asset('uploads/' . $this->hero_image_800) : null;
    }

    public function getHeroImage1000UrlAttribute(): ?string
    {
        return $this->hero_image_1000 ? asset('uploads/' . $this->hero_image_1000) : null;
    }

    public function getHeroImage1500UrlAttribute(): ?string
    {
        return $this->hero_image_1500 ? asset('uploads/' . $this->hero_image_1500) : null;
    }

    // Helper method to get srcset
    public function getHeroSrcsetAttribute(): string
    {
        $srcset = [];
        if ($this->hero_image_400) {
            $srcset[] = asset('uploads/' . $this->hero_image_400) . ' 400w';
        }
        if ($this->hero_image_500) {
            $srcset[] = asset('uploads/' . $this->hero_image_500) . ' 500w';
        }
        if ($this->hero_image_600) {
            $srcset[] = asset('uploads/' . $this->hero_image_600) . ' 600w';
        }
        if ($this->hero_image_700) {
            $srcset[] = asset('uploads/' . $this->hero_image_700) . ' 700w';
        }
        if ($this->hero_image_800) {
            $srcset[] = asset('uploads/' . $this->hero_image_800) . ' 800w';
        }
        if ($this->hero_image_1000) {
            $srcset[] = asset('uploads/' . $this->hero_image_1000) . ' 1000w';
        }
        if ($this->hero_image_1500) {
            $srcset[] = asset('uploads/' . $this->hero_image_1500) . ' 1500w';
        }
        return implode(', ', $srcset);
    }

    // Scope for active hero section
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->latest();
    }
}