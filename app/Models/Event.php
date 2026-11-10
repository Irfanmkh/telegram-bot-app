<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'event_time',
        'is_notified',
    ];

    protected $casts = [
        'event_time' => 'datetime',
        'is_notified' => 'boolean',
    ];

}
