<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalPage extends Model
{
    use HasFactory;

    protected $table = 'legal_pages';

    protected $fillable = ['type', 'page_title', 'introduction', 'last_updated', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    public function sections()
    {
        return $this->hasMany(LegalSection::class, 'legal_page_id')->where('is_active', true)->orderBy('order');
    }
}
