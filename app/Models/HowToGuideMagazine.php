<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HowToGuideMagazine extends Model
{
    use HasFactory;

    protected $table = 'how_to_guide_magazines';

    protected $fillable = ['title', 'subtitle', 'description', 'document', 'image', 'is_active', 'order'];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('uploads/' . $this->image) : null;
    }

    public function getDocumentUrlAttribute(): ?string
    {
        return $this->document ? asset('uploads/' . $this->document) : null;
    }
}
