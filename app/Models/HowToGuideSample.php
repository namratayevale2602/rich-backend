<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HowToGuideSample extends Model
{
    use HasFactory;

    protected $table = 'how_to_guide_samples';

    protected $fillable = ['title', 'description', 'document', 'is_active', 'order'];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getDocumentUrlAttribute(): ?string
    {
        return $this->document ? asset('uploads/' . $this->document) : null;
    }
}
