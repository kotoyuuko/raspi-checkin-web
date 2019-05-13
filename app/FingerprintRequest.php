<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FingerprintRequest extends Model
{
    protected $fillable = [
        'user_id', 'fingerprint', 'status', 'client_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
