<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Package extends Model
{
    //

    protected $fillable = [
        'name',
        'original_price',
        'price',
        'is_active',
    ];

    protected $casts = [
        'original_price' => 'integer',
        'price' => 'integer',
        'is_active' => 'boolean',
    ];

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
