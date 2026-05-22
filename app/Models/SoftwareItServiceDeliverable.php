<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoftwareItServiceDeliverable extends Model
{
    protected $table = 'software_it_service_deliverables';
    protected $fillable = ['service_id', 'title', 'description', 'features', 'order'];
    protected $casts = ['features' => 'array'];

    public function service()
    {
        return $this->belongsTo(SoftwareItService::class, 'service_id');
    }
}
