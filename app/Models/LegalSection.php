<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalSection extends Model
{
    use HasFactory;

    protected $table = 'legal_sections';

    protected $fillable = ['legal_page_id', 'title', 'content', 'show_contact_info', 'order', 'is_active'];

    protected $casts = [
        'show_contact_info' => 'boolean',
        'is_active'         => 'boolean',
    ];

    public function legalPage()
    {
        return $this->belongsTo(LegalPage::class, 'legal_page_id');
    }

    public function subsections()
    {
        return $this->hasMany(LegalSubsection::class, 'legal_section_id')->where('is_active', true)->orderBy('order');
    }
}
