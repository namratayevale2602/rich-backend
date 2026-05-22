<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoftwareItServiceFeature extends Model
{
    protected $table = 'software_it_service_features';
    protected $fillable = ['service_id', 'feature', 'order'];

    public function service()
    {
        return $this->belongsTo(SoftwareItService::class, 'service_id');
    }
}
