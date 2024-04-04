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

    /**
     * The user belongs to the error model.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The route key name for find the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Change the model's status as pending.
     *
     * @return void
     */
    public function markAsPending(): void
    {
        $this->update([
            'status' => ErrorStatus::Pending
        ]);
    }

    /**
     * Change the model's status as approved.
     *
     * @return void
     */
    public function markAsApproved(): void
    {
        $this->update([
            'status' => ErrorStatus::Approved
        ]);
    }

    /**
     * Change the model's status as rejected.
     *
     * @return void
     */
    public function markAsRejected(): void
    {
        $this->update([
            'status' => ErrorStatus::Rejected
        ]);
    }

    /**
     * An scope for filter approved errors.
     *
     * @param Builder $builder
     * @return void
     */
    public function scopeApproved(Builder $builder): void
    {
        $builder->where('status', '=', ErrorStatus::Approved);
    }
}
