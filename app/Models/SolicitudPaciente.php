<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudPaciente extends Model
{
    use HasFactory;

    protected $table = 'solicitudes_pacientes';

    protected $fillable = [
        'user_id',
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'genero',
        'edad',
        'foto',
        'motivo',
        'estado',
        'profesional_id',
        'paciente_id',
        'nota_revision',
        'revisada_at',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
        'revisada_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profesional()
    {
        return $this->belongsTo(Profesional::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function scopePendientes($query)
    {
        return $query->where('estado', 'pendiente');
    }
}
