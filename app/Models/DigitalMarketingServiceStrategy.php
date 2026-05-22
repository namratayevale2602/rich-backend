<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DigitalMarketingServiceStrategy extends Model
{
    protected $table = 'digital_marketing_service_strategies';
    protected $fillable = ['service_id', 'title', 'description', 'tactics', 'order'];
    protected $casts = ['tactics' => 'array'];

    public function service()
    {
        return $this->belongsTo(DigitalMarketingService::class, 'service_id');
    }
}
