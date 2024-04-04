<?php

namespace App\Models;

use App\Enums\ErrorStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Error extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'status' => ErrorStatus::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function markAsPending(): void
    {
        $this->update([
            'status' => ErrorStatus::Pending
        ]);
    }

    public function markAsApproved(): void
    {
        $this->update([
            'status' => ErrorStatus::Approved
        ]);
    }

    public function markAsRejected(): void
    {
        $this->update([
            'status' => ErrorStatus::Rejected
        ]);
    }

    public function scopeApproved(Builder $builder): void
    {
        $builder->where('status', '=', ErrorStatus::Approved);
    }
}
