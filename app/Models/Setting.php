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

    public static function isPromoAllAccessActive(): bool
    {
        $isActive = filter_var(static::get('promo_all_access', '1'), FILTER_VALIDATE_BOOLEAN);
        $until = static::get('promo_all_access_until');

        if (!$isActive) {
            return false;
        }

        if (!empty($until) && now()->startOfDay()->gt(\Illuminate\Support\Carbon::parse($until)->endOfDay())) {
            return false;
        }

        return true;
    }
}
