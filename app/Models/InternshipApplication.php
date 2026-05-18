<?php
// app/Models/InternshipApplication.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Filament\Panel;
use Filament\Models\Contracts\HasName;

class InternshipApplication extends Model implements HasName
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'whatsapp',
        'date_of_birth',
        'gender',
        'location',
        'other_location',
        'college',
        'other_college',
        'branch',
        'year',
        'technology',
        'mode',
        'status',
        'admin_notes',
        'reviewed_at',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'reviewed_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    // Status constants
    const STATUS_PENDING = 'pending';
    const STATUS_REVIEWED = 'reviewed';
    const STATUS_SHORTLISTED = 'shortlisted';
    const STATUS_ACCEPTED = 'accepted';
    const STATUS_REJECTED = 'rejected';

    public static function getStatuses(): array
    {
        return [
            self::STATUS_PENDING => 'Pending',
            self::STATUS_REVIEWED => 'Reviewed',
            self::STATUS_SHORTLISTED => 'Shortlisted',
            self::STATUS_ACCEPTED => 'Accepted',
            self::STATUS_REJECTED => 'Rejected',
        ];
    }

    // Accessor for Filament's name
    public function getFilamentName(): string
    {
        return "{$this->name} - {$this->email}";
    }

    // Scopes for filtering
    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    public function scopeByTechnology($query, $technology)
    {
        return $query->where('technology', $technology);
    }

    public function scopeByMode($query, $mode)
    {
        return $query->where('mode', $mode);
    }

    // Get full location (combines location and other_location)
    public function getFullLocationAttribute(): string
    {
        return $this->location === 'Other' 
            ? $this->other_location 
            : $this->location;
    }

    // Get full college (combines college and other_college)
    public function getFullCollegeAttribute(): string
    {
        return $this->college === 'Other' 
            ? $this->other_college 
            : $this->college;
    }
}