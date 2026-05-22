<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceBenefit extends Model
{
    use HasFactory;

    protected $table = 'service_benefits';

    protected $fillable = ['service_id', 'title', 'subtitle', 'description', 'image', 'list'];

    protected $casts = ['list' => 'array'];

    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('uploads/' . $this->image) : null;
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
