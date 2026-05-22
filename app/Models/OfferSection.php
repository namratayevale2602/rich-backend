<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OfferSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'subtitle', 'description',
        'button_text', 'button_link', 'video', 'is_active',
    ];

    protected $casts = ['is_active' => 'boolean'];

    public function getVideoUrlAttribute(): ?string
    {
        return $this->video ? asset('uploads/' . $this->video) : null;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
