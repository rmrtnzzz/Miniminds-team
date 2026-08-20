<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesional extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $table = 'profesionales';
=======

>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
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
<<<<<<< HEAD

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
=======
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
}
