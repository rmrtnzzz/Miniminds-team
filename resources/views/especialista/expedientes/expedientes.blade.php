<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asignacion extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'paciente_id',
        'especialista_id',
        'assignable_id',
        'assignable_type',
        'fecha_asignacion',
        'fecha_limite',
        'estado',
        'notas',
    ];

    public function assignable()
    {
        return $this->morphTo();
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function especialista()
    {
        return $this->belongsTo(Especialista::class);
    }
}