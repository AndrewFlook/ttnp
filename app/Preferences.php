<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preferences extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'key',
        'value',
    ];

    public function exists($key)
    {
        return self::where('key', $key)->exists();
    }

    public function get($key, $default = null)
    {
        if ($preference = self::where('key', $key)->first()) {
            return $preference->value;
        }

        return $default;
    }

    public function set($key, $value = null)
    {
        $keys = is_array($key) ? $key : [$key => $value];

        foreach($keys as $key => $value) {
            self::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }

    public function remove($key)
    {
        return (bool) self::where('key', $key)->delete();
    }
}
