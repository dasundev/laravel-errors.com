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

    public function scopeMarkAsPending(Builder $builder): void
    {
        $builder->update(['status' => ErrorStatus::Pending]);
    }

    public function scopeMarkAsApproved(Builder $builder): void
    {
        $builder->update(['status' => ErrorStatus::Approved]);
    }

    public function scopeMarkAsRejected(Builder $builder): void
    {
        $builder->update(['status' => ErrorStatus::Rejected]);
    }
}
