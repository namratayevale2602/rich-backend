<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DigitalMarketingServiceDeliverMetric extends Model
{
    protected $table = 'digital_marketing_service_deliver_metrics';
    protected $fillable = ['service_id', 'label', 'value', 'order'];

    public function service()
    {
        return $this->belongsTo(DigitalMarketingService::class, 'service_id');
    }
}
