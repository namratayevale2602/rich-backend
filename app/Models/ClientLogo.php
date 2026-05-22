<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientLogo extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'logo', 'logo_2x', 'logo_sizes', 'order', 'is_active'];

    protected $casts = ['is_active' => 'boolean', 'order' => 'integer'];

    public function getLogoUrlAttribute(): ?string
    {
        return $this->logo ? asset('uploads/' . $this->logo) : null;
    }

    public function getLogo2xUrlAttribute(): ?string
    {
        return $this->logo_2x ? asset('uploads/' . $this->logo_2x) : null;
    }

    public function getLogoSrcsetAttribute(): ?string
    {
        if (!$this->logo) return null;
        $parts = [asset('uploads/' . $this->logo) . ' 1x'];
        if ($this->logo_2x) {
            $parts[] = asset('uploads/' . $this->logo_2x) . ' 2x';
        }
        return count($parts) > 1 ? implode(', ', $parts) : null;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}
