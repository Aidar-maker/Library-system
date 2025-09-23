<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /** @use HasFactory<\Database\Factories\SettingFactory> */
    use HasFactory;

    protected $fillable = [
        "key",
        "value",
        "description",
    ];


    public static function get($key, $default = null){
        $setting = self::where("key", $key)->first();
        return $setting ? $setting->value : $default;
    }

    public static function set($key, $value, $description = null){
        self::updateOrCreate(
            ["key"=> $key],
            ["value"=> $value,"description"=> $description]
        );
    }
}
