<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    //
    protected $fillable = ['name', 'original_price', 'price', 'is_active'];
}
