<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DigitalMarketingServiceSolution extends Model
{
    protected $table = 'digital_marketing_service_solutions';
    protected $fillable = ['service_id', 'title', 'description', 'features', 'order'];
    protected $casts = ['features' => 'array'];

    public function service()
    {
        return $this->belongsTo(DigitalMarketingService::class, 'service_id');
    }
}
