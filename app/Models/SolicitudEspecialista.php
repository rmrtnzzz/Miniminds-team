<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SolicitudEspecialista extends Model {
    protected $table = 'solicitudes_especialista';
    protected $fillable = ['user_id','titulo_profesional','especialidad','anios_experiencia','motivacion','formacion','puntaje_test','estado','notas_admin'];
    public function user() { return $this->belongsTo(User::class); }
    public function scopePendientes($q) { return $q->where('estado','pendiente'); }
}
