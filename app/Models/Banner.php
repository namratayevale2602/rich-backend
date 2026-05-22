<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'desktop_image',
        'mobile_image',
        'mobile_image_400',
        'mobile_image_760',
        'mobile_image_1080',
        'order',
        'is_active',
        'cta_text',
        'cta_link',
        'cta_secondary_text',
        'cta_secondary_link',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    // Accessors for full image URLs
    public function getDesktopImageUrlAttribute(): ?string
    {
        return $this->desktop_image ? asset('uploads/' . $this->desktop_image) : null;
    }

    public function getMobileImageUrlAttribute(): ?string
    {
        return $this->mobile_image ? asset('uploads/' . $this->mobile_image) : null;
    }

    public function getMobileImage400UrlAttribute(): ?string
    {
        return $this->mobile_image_400 ? asset('uploads/' . $this->mobile_image_400) : null;
    }

    public function getMobileImage760UrlAttribute(): ?string
    {
        return $this->mobile_image_760 ? asset('uploads/' . $this->mobile_image_760) : null;
    }

    public function getMobileImage1080UrlAttribute(): ?string
    {
        return $this->mobile_image_1080 ? asset('uploads/' . $this->mobile_image_1080) : null;
    }

    // Helper method to get mobile srcset
    public function getMobileSrcsetAttribute(): string
    {
        $srcset = [];
        if ($this->mobile_image_400) {
            $srcset[] = asset('uploads/' . $this->mobile_image_400) . ' 400w';
        }
        if ($this->mobile_image_760) {
            $srcset[] = asset('uploads/' . $this->mobile_image_760) . ' 760w';
        }
        if ($this->mobile_image_1080) {
            $srcset[] = asset('uploads/' . $this->mobile_image_1080) . ' 1080w';
        }
        return implode(', ', $srcset);
    }

    // Scope for active banners
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}