<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SignLog extends Model
{
    protected $fillable = [
        'user_id', 'start_at', 'end_at',
    ];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
