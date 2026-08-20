<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    protected $fillable = ['user_id', 'titulo', 'contenido', 'estado', 'motivo_bloqueo'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class)->latest();
    }

    public function scopePublicadas($query)
    {
        return $query->where('estado', 'publicada');
    }

    public function scopeBloqueadas($query)
    {
        return $query->where('estado', 'bloqueada');
    }
}
