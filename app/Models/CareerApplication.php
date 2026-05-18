<?php
// app/Models/CareerApplication.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class CareerApplication extends Model
{
    use HasFactory;

    protected $table = 'career_applications';

    protected $fillable = [
        'fullname',
        'email',
        'mobile',
        'apply_for',
        'resume_path',
        'resume_original_name',
        'resume_mime_type',
        'resume_size',
        'status',
        'admin_notes',
        'reviewed_at',
        'reviewed_by',
        'ip_address',
        'user_agent'
    ];

    protected $casts = [
        'reviewed_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'resume_size' => 'integer'
    ];

    // Status Constants
    const STATUS_PENDING = 'pending';
    const STATUS_REVIEWED = 'reviewed';
    const STATUS_SHORTLISTED = 'shortlisted';
    const STATUS_REJECTED = 'rejected';
    const STATUS_HIRED = 'hired';

    // Scopes
    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    public function scopeReviewed(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_REVIEWED);
    }

    public function scopeShortlisted(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_SHORTLISTED);
    }

    public function scopeByPosition(Builder $query, string $position): Builder
    {
        return $query->where('apply_for', $position);
    }

    // Helper Methods
    public function markAsReviewed(int $adminId = null): void
    {
        $this->update([
            'status' => self::STATUS_REVIEWED,
            'reviewed_at' => now(),
            'reviewed_by' => $adminId
        ]);
    }

    public function markAsShortlisted(): void
    {
        $this->update(['status' => self::STATUS_SHORTLISTED]);
    }

    public function markAsRejected(): void
    {
        $this->update(['status' => self::STATUS_REJECTED]);
    }

    public function markAsHired(): void
    {
        $this->update(['status' => self::STATUS_HIRED]);
    }

    // Accessors
    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            self::STATUS_PENDING => 'Pending',
            self::STATUS_REVIEWED => 'Reviewed',
            self::STATUS_SHORTLISTED => 'Shortlisted',
            self::STATUS_REJECTED => 'Rejected',
            self::STATUS_HIRED => 'Hired',
            default => 'Unknown',
        };
    }

    public function getResumeUrlAttribute(): ?string
    {
        if ($this->resume_path) {
            return asset('storage/' . $this->resume_path);
        }
        return null;
    }
}