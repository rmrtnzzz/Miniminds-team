<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesional extends Model
{
    use HasFactory;
    protected $table = 'profesionales';
    protected $fillable = [
        'user_id',
        'nombre',
        'apellido',
        'telefono',
        'fecha_nacimiento',
        'genero',
        'especialidad',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }

    public function pacientes()
    {
        return $this->hasMany(Paciente::class);
    }

    public function solicitudesPacientes()
    {
        return $this->hasMany(SolicitudPaciente::class);
    }
}
