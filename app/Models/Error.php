<?php

namespace App\Models;

use App\Enums\ErrorStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'status' => ErrorStatus::class
    ];

    public function scopeMarkAsPending(Builder $builder): void
    {
        $builder->update(['status' => ErrorStatus::Pending]);
    }

    public function scopeMarkAsSuccess(Builder $builder): void
    {
        $builder->update(['status' => ErrorStatus::Pending]);
    }

    public function scopeMarkAsRejected(Builder $builder): void
    {
        $builder->update(['status' => ErrorStatus::Pending]);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
