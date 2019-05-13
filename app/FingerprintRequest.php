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
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
