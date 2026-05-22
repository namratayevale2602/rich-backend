<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DigitalMarketingServiceFeature extends Model
{
    protected $table = 'digital_marketing_service_features';
    protected $fillable = ['service_id', 'feature', 'order'];

    public function service()
    {
        return $this->belongsTo(DigitalMarketingService::class, 'service_id');
    }
}
