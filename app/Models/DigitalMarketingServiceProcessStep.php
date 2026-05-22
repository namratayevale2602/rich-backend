<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DigitalMarketingServiceProcessStep extends Model
{
    protected $table = 'digital_marketing_service_process_steps';
    protected $fillable = ['service_id', 'title', 'description', 'activities', 'order'];
    protected $casts = ['activities' => 'array'];

    public function service()
    {
        return $this->belongsTo(DigitalMarketingService::class, 'service_id');
    }
}
