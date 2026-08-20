<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = [
        'experiencia_id',
        'user_id',
        'contenido',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function experiencia()
    {
        return $this->belongsTo(Experiencia::class);
    }
}
