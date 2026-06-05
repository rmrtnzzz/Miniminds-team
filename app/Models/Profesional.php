<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesional extends Model
{
    use HasFactory;

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
}
