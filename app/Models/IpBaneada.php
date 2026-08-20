<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IpBaneada extends Model
{
    protected $table = 'ips_baneadas';

    protected $fillable = ['ip', 'user_id', 'motivo', 'baneada_at'];

    protected $casts = [
        'baneada_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
