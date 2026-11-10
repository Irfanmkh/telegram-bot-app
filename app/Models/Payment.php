<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'user_id',
        'package_id',
        'invoice_number',
        'base_amount',
        'unique_code',
        'total_amount',
        'status',
        'receipt_image',
    ];

    protected $casts = [
        'base_amount' => 'integer',
        'unique_code' => 'integer',
        'total_amount' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }
}
