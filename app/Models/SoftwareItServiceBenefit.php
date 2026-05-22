<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoftwareItServiceBenefit extends Model
{
    protected $table = 'software_it_service_benefits';
    protected $fillable = ['service_id', 'title', 'description', 'order'];

    public function service()
    {
        return $this->belongsTo(SoftwareItService::class, 'service_id');
    }
}
