<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DigitalMarketingServiceBenefit extends Model
{
    protected $table = 'digital_marketing_service_benefits';
    protected $fillable = ['service_id', 'title', 'description', 'order'];

    public function service()
    {
        return $this->belongsTo(DigitalMarketingService::class, 'service_id');
    }
}
