<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoftwareItService extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug', 'label', 'order', 'is_active',
        'hero_title', 'hero_description',
        'deliver_title', 'deliver_description',
        'tech_title', 'tech_description',
        'process_title', 'process_description',
        'benefits_title', 'benefits_description',
    ];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function features()
    {
        return $this->hasMany(SoftwareItServiceFeature::class, 'service_id')->orderBy('order');
    }

    public function deliverables()
    {
        return $this->hasMany(SoftwareItServiceDeliverable::class, 'service_id')->orderBy('order');
    }

    public function techCategories()
    {
        return $this->hasMany(SoftwareItServiceTechCategory::class, 'service_id')->orderBy('order');
    }

    public function processSteps()
    {
        return $this->hasMany(SoftwareItServiceProcessStep::class, 'service_id')->orderBy('order');
    }

    public function benefits()
    {
        return $this->hasMany(SoftwareItServiceBenefit::class, 'service_id')->orderBy('order');
    }
}
