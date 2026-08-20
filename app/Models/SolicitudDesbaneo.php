<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SolicitudDesbaneo extends Model {
    protected $table = 'solicitudes_desbaneo';
    protected $fillable = ['user_id','justificacion','estado','respuesta_admin','fecha_solicitud'];
    protected $casts = ['fecha_solicitud' => 'date'];
    public function user() { return $this->belongsTo(User::class); }
    public function scopePendientes($q) { return $q->where('estado','pendiente'); }
}
