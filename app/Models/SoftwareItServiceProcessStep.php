<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoftwareItServiceProcessStep extends Model
{
    protected $table = 'software_it_service_process_steps';
    protected $fillable = ['service_id', 'title', 'description', 'activities', 'order'];
    protected $casts = ['activities' => 'array'];

    public function service()
    {
        return $this->belongsTo(SoftwareItService::class, 'service_id');
    }
}
