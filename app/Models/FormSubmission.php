<?php
// app/Models/FormSubmission.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class FormSubmission extends Model
{
    use HasFactory;

    protected $table = 'form_submissions';

    protected $fillable = [
        'form_type',
        'fullname',
        'email',
        'mobile',
        'company',
        'message',
        'country',
        'city',
        'product',
        'agreement',
        'status',
        'admin_notes',
        'read_at',
        'replied_at',
        'ip_address',
        'user_agent'
    ];

    protected $casts = [
        'agreement' => 'boolean',
        'read_at' => 'datetime',
        'replied_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Form type constants
    const TYPE_CONTACT = 'contact';
    const TYPE_ENQUIRY = 'enquiry';
    const TYPE_DEMO = 'demo';

    // Status constants
    const STATUS_PENDING = 'pending';
    const STATUS_READ = 'read';
    const STATUS_REPLIED = 'replied';
    const STATUS_SPAM = 'spam';

    // Scopes for filtering by form type
    public function scopeContact(Builder $query): Builder
    {
        return $query->where('form_type', self::TYPE_CONTACT);
    }

    public function scopeEnquiry(Builder $query): Builder
    {
        return $query->where('form_type', self::TYPE_ENQUIRY);
    }

    public function scopeDemo(Builder $query): Builder
    {
        return $query->where('form_type', self::TYPE_DEMO);
    }

    // Status scopes
    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    public function scopeUnread(Builder $query): Builder
    {
        return $query->whereNull('read_at');
    }

    // Helper methods
    public function markAsRead(): void
    {
        if (is_null($this->read_at)) {
            $this->update([
                'read_at' => now(),
                'status' => self::STATUS_READ
            ]);
        }
    }

    public function markAsReplied(): void
    {
        $this->update([
            'replied_at' => now(),
            'status' => self::STATUS_REPLIED
        ]);
    }

    public function markAsSpam(): void
    {
        $this->update(['status' => self::STATUS_SPAM]);
    }

    // Accessor for form type label
    public function getFormTypeLabelAttribute(): string
    {
        return match($this->form_type) {
            self::TYPE_CONTACT => 'Contact Form',
            self::TYPE_ENQUIRY => 'Enquiry Form',
            self::TYPE_DEMO => 'Demo Request',
            default => 'Unknown',
        };
    }

    // Accessor for status label
    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            self::STATUS_PENDING => 'Pending',
            self::STATUS_READ => 'Read',
            self::STATUS_REPLIED => 'Replied',
            self::STATUS_SPAM => 'Spam',
            default => 'Unknown',
        };
    }
}