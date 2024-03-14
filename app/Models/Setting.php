<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = [
        'key',
        'value'
    ];

    public static function get($key)
    {
        if(self::has($key))
        {
            return self::where('key', $key)->first()->value;
        } else {
            return null;
        }
    }

    public static function set($key, $value)
    {
        $setting = self::where('key', $key)->first();
        if ($setting) {
            $setting->value = $value;
            $setting->save();
        } else {
            self::create([
                'key' => $key,
                'value' => $value
            ]);
        }
    }

    public static function updateKey($key, $value)
    {
        $setting = self::where('key', $key)->first();
        if ($setting) {
            $setting->value = $value;
            $setting->save();
        }
    }

    public static function forget($key)
    {
        self::where('key', $key)->delete();
    }

    public static function has($key)
    {
        return self::where('key', $key)->exists();
    }

    public static function allSettings()
    {
        return self::all();
    }
}
