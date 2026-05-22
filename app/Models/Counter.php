<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Counter extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
        'icon_2x',
        'icon_sizes',
        'number',
        'title_suffix',
        'subtitle',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order'     => 'integer',
        'number'    => 'integer',
    ];

    public function getIconUrlAttribute(): ?string
    {
        return $this->icon ? asset('uploads/' . $this->icon) : null;
    }

    public function getIcon2xUrlAttribute(): ?string
    {
        return $this->icon_2x ? asset('uploads/' . $this->icon_2x) : null;
    }

    public function getIconSrcsetAttribute(): ?string
    {
        if (!$this->icon) {
            return null;
        }

        $parts = [asset('uploads/' . $this->icon) . ' 1x'];

        if ($this->icon_2x) {
            $parts[] = asset('uploads/' . $this->icon_2x) . ' 2x';
        }

        return count($parts) > 1 ? implode(', ', $parts) : null;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}
