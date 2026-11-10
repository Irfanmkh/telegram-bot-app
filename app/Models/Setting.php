<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    use HasFactory;

    protected $fillable = ['key', 'value'];

    // Helper static function untuk memanggil setting dengan mudah
    public static function get(string $key, mixed $default = null): mixed
    {
        $setting = self::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }
}
