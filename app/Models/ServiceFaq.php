<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceFaq extends Model
{
    use HasFactory;

    protected $table = 'service_faqs';

    protected $fillable = ['service_id', 'question', 'answer', 'is_general', 'order', 'is_active'];

    protected $casts = [
        'is_general' => 'boolean',
        'is_active'  => 'boolean',
        'order'      => 'integer',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
