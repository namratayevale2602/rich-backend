<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceSlider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'product_name',
        'description',
        'image',
        'image_440',
        'image_600',
        'image_1050',
        'image_1500',
        'icon',
        'category',
        'slug',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('uploads/' . $this->image) : null;
    }

    public function getImage440UrlAttribute(): ?string
    {
        return $this->image_440 ? asset('uploads/' . $this->image_440) : null;
    }

    public function getImage600UrlAttribute(): ?string
    {
        return $this->image_600 ? asset('uploads/' . $this->image_600) : null;
    }

    public function getImage1050UrlAttribute(): ?string
    {
        return $this->image_1050 ? asset('uploads/' . $this->image_1050) : null;
    }

    public function getImage1500UrlAttribute(): ?string
    {
        return $this->image_1500 ? asset('uploads/' . $this->image_1500) : null;
    }

    public function getSrcsetAttribute(): string
    {
        $srcset = [];
        if ($this->image_440) {
            $srcset[] = asset('uploads/' . $this->image_440) . ' 440w';
        }
        if ($this->image_600) {
            $srcset[] = asset('uploads/' . $this->image_600) . ' 600w';
        }
        if ($this->image_1050) {
            $srcset[] = asset('uploads/' . $this->image_1050) . ' 1050w';
        }
        if ($this->image_1500) {
            $srcset[] = asset('uploads/' . $this->image_1500) . ' 1500w';
        }
        return implode(', ', $srcset);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}
