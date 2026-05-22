<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Industry extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'image', 'image_440', 'image_700',
        'bg_color', 'accent_color', 'path', 'order', 'is_active',
    ];

    protected $casts = ['is_active' => 'boolean', 'order' => 'integer'];

    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('uploads/' . $this->image) : null;
    }

    public function getImage440UrlAttribute(): ?string
    {
        return $this->image_440 ? asset('uploads/' . $this->image_440) : null;
    }

    public function getImage700UrlAttribute(): ?string
    {
        return $this->image_700 ? asset('uploads/' . $this->image_700) : null;
    }

    public function getImageSrcsetAttribute(): string
    {
        $srcset = [];
        if ($this->image_440) $srcset[] = asset('uploads/' . $this->image_440) . ' 440w';
        if ($this->image_700) $srcset[] = asset('uploads/' . $this->image_700) . ' 700w';
        return implode(', ', $srcset);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}
