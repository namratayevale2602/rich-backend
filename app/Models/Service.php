<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'slug',
        'title',
        'subtitle',
        'full_desc',
        'detailed_desc',
        'image',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order'     => 'integer',
    ];

    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('uploads/' . $this->image) : null;
    }

    public function subtypes(): HasMany
    {
        return $this->hasMany(ServiceSubtype::class)->orderBy('order');
    }

    public function benefits(): HasMany
    {
        return $this->hasMany(ServiceBenefit::class);
    }

    public function caseStudies(): HasMany
    {
        return $this->hasMany(ServiceCaseStudy::class)->orderBy('order');
    }

    public function faqs(): HasMany
    {
        return $this->hasMany(ServiceFaq::class)->where('is_active', true)->orderBy('order');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}
