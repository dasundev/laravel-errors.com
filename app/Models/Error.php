<?php

namespace App\Models;

use App\Enums\ErrorStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'status' => ErrorStatus::class
    ];
}
