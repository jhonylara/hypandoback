<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Access extends Model
{
    protected $fillable = [
        'user_id',
        'provider_name',
        'provider_id',
        'isLoginAccess'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
