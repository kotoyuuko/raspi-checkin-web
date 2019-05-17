<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name', 'ip', 'port', 'token',
    ];

    public function requests()
    {
        return $this->hasMany(FingerprintRequest::class);
    }

    public static function findByToken($token)
    {
        return self::where('token', $token)->first();
    }
}
