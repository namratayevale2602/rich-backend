<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceSubtype extends Model
{
    use HasFactory;

    protected $table = 'service_subtypes';

    protected $fillable = ['service_id', 'title', 'description', 'image', 'order'];

    protected $casts = ['order' => 'integer'];

    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('uploads/' . $this->image) : null;
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
