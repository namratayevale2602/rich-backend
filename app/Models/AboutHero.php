<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutHero extends Model
{
    use HasFactory;

    protected $table = 'about_heroes';

    protected $fillable = [
        'heading',
        'subtitle',
        'description',
        'image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
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
