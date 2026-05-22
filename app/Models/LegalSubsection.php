<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalSubsection extends Model
{
    use HasFactory;

    protected $table = 'legal_subsections';

    protected $fillable = ['legal_section_id', 'title', 'content', 'order', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];
}
