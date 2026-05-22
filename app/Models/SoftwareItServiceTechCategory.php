<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoftwareItServiceTechCategory extends Model
{
    protected $table = 'software_it_service_tech_categories';
    protected $fillable = ['service_id', 'category', 'technologies', 'order'];
    protected $casts = ['technologies' => 'array'];

    public function service()
    {
        return $this->belongsTo(SoftwareItService::class, 'service_id');
    }
}
