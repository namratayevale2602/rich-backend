<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalMarketingService extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug', 'label', 'order', 'is_active',
        'hero_title', 'hero_description',
        'deliver_title', 'deliver_description', 'deliver_approach',
        'process_title', 'process_description',
        'strategies_title', 'strategies_description',
        'benefits_title', 'benefits_description',
    ];

    protected $casts = [
        'is_active'        => 'boolean',
        'deliver_approach' => 'array',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function features()
    {
        return $this->hasMany(DigitalMarketingServiceFeature::class, 'service_id')->orderBy('order');
    }

    public function deliverMetrics()
    {
        return $this->hasMany(DigitalMarketingServiceDeliverMetric::class, 'service_id')->orderBy('order');
    }

    public function solutions()
    {
        return $this->hasMany(DigitalMarketingServiceSolution::class, 'service_id')->orderBy('order');
    }

    public function strategies()
    {
        return $this->hasMany(DigitalMarketingServiceStrategy::class, 'service_id')->orderBy('order');
    }

    public function processSteps()
    {
        return $this->hasMany(DigitalMarketingServiceProcessStep::class, 'service_id')->orderBy('order');
    }

    public function benefits()
    {
        return $this->hasMany(DigitalMarketingServiceBenefit::class, 'service_id')->orderBy('order');
    }
}
