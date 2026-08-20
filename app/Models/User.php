<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

<<<<<<< HEAD
    
    protected $fillable = [
        'name',
        'apellido',
        'email',
        'role',
        'telefono',
        'fecha_nacimiento',
        'genero',
        'foto',
        'password',
        'advertencias',
        'veces_baneado',
        'baneado',
        'tipo_baneo',
        'baneado_hasta',
        'motivo_baneo',
        'ultima_ip',
    ];

    
    public const ROLE_USUARIO = 'usuario';
    public const ROLE_ESPECIALISTA = 'especialista';
    public const ROLE_ADMIN = 'admin';

    
=======
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
    protected $hidden = [
        'password',
        'remember_token',
    ];

<<<<<<< HEAD
    
    protected $casts = [
        'email_verified_at' => 'datetime',
        'baneado' => 'boolean',
        'baneado_hasta' => 'datetime',
    ];

    public function isUsuario(): bool
    {
        return $this->role === self::ROLE_USUARIO;
    }

    public function isEspecialista(): bool
    {
        return $this->role === self::ROLE_ESPECIALISTA;
    }

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    
    public function pacientes()
    {
        return $this->hasMany(Paciente::class);
    }

    
    public function profesional()
    {
        return $this->hasOne(Profesional::class);
    }

    
    public function solicitudesPacientes()
    {
        return $this->hasMany(SolicitudPaciente::class);
    }

    
    public function experiencias()
    {
        return $this->hasMany(Experiencia::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function solicitudesEspecialista()
    {
        return $this->hasMany(SolicitudEspecialista::class);
    }

    public function solicitudesDesbaneo()
    {
        return $this->hasMany(SolicitudDesbaneo::class);
    }

    public function estaBaneadoActualmente(): bool
    {
        if (!$this->baneado) {
            return false;
        }

        if ($this->tipo_baneo === 'temporal' && $this->baneado_hasta && $this->baneado_hasta->isPast()) {
            return false; 
        }

        return true;
    }

    public function esBaneoPermanente(): bool
    {
        return $this->tipo_baneo === 'permanente';
    }

    
    public function panelRouteName(): string
    {
        return match ($this->role) {
            'admin' => 'admin.inicio',
            'especialista' => 'especialista.inicio',
            default => 'paciente.inicio',
        };
    }

    public function panelUrl(): string
    {
        return route($this->panelRouteName());
    }
=======
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
}
