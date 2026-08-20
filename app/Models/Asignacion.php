<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    use HasFactory;

    protected $table = 'asignaciones';

    protected $fillable = [
        'paciente_id',
        'profesional_id',
        'tipo',
        'titulo',
        'descripcion',
        'juego_ruta',
        'estado',
        'nota_completado',
        'completada_at',
    ];

    protected $casts = [
        'completada_at' => 'datetime',
    ];

    
    public const JUEGOS_DISPONIBLES = [
        'juegos.el_gran_orden'   => 'El Gran Orden',
        'juegos.ritmo_zen'       => 'Ritmo Zen',
        'juegos.volcan_interior' => 'Volcán Interior',
        'juegos.cerebro'         => 'Explorar el Cerebro 3D',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function profesional()
    {
        return $this->belongsTo(Profesional::class);
    }

    public function scopeActivas($query)
    {
        return $query->where('estado', 'activa');
    }
}
