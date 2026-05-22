<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceWeOffer extends Model
{
    use HasFactory;

    protected $table = 'services_we_offer';

    protected $fillable = [
        'number', 'title', 'description',
        'image', 'image_400', 'image_700',
        'gradient', 'icon', 'features',
        'order', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order'     => 'integer',
        'features'  => 'array',
    ];

    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('uploads/' . $this->image) : null;
    }

    public function getImage400UrlAttribute(): ?string
    {
        return $this->image_400 ? asset('uploads/' . $this->image_400) : null;
    }

    public function getImage700UrlAttribute(): ?string
    {
        return $this->image_700 ? asset('uploads/' . $this->image_700) : null;
    }

    public function getImageSrcsetAttribute(): string
    {
        $srcset = [];
        if ($this->image_400) $srcset[] = asset('uploads/' . $this->image_400) . ' 400w';
        if ($this->image_700) $srcset[] = asset('uploads/' . $this->image_700) . ' 700w';
        return implode(', ', $srcset);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}
