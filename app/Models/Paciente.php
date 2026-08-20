<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'profesional_id',
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'genero',
        'edad',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profesional()
    {
        return $this->belongsTo(Profesional::class);
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }

    public function asignaciones()
    {
        return $this->hasMany(Asignacion::class);
    }
}