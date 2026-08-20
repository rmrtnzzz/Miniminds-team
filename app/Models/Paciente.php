<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
<<<<<<< HEAD
        'profesional_id',
=======
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
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
<<<<<<< HEAD

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
=======
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
}