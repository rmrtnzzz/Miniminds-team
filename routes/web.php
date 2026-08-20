<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\JuegoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ProfesionalController;
use App\Http\Controllers\Usuario\SolicitudPacienteController;
use App\Http\Controllers\Usuario\SolicitudEspecialistaController;
use App\Http\Controllers\Usuario\SolicitudDesbaneController;
use App\Http\Controllers\Especialista\PanelController as EspecialistaPanelController;
use App\Http\Controllers\Especialista\SolicitudController as EspecialistaSolicitudController;
use App\Http\Controllers\Especialista\PacienteController as EspecialistaPacienteController;
use App\Http\Controllers\Especialista\AsignacionController as EspecialistaAsignacionController;
use App\Http\Controllers\Especialista\CitaController as EspecialistaCitaController;
use App\Http\Controllers\Especialista\NotificacionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminPerfilController;
use App\Http\Controllers\Admin\InboxController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ExperienciaController;
use App\Http\Controllers\Usuario\AvisoController;
use App\Http\Controllers\Admin\AdminExperienciaController;
use App\Http\Controllers\Admin\NotificacionController as AdminNotificacionController;
use App\Http\Controllers\ComentarioController;

Route::get('/', fn() => view('home'))->name('home');

Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::post('/contacto', [ContactoController::class, 'enviar'])->name('contacto.enviar');

// Páginas públicas de información (frontend)
Route::get('/divergencia', fn() => view('divergencia'))->name('divergencia');
Route::get('/Normas', fn() => view('Normas'))->name('Normas');
Route::get('/dislexia', fn() => view('dislexia'))->name('dislexia');
Route::get('/discalculia', fn() => view('discalculia'))->name('discalculia');
Route::get('/neurodiver', fn() => view('neurodiver'))->name('neurodiver');
Route::get('/padres', fn() => view('padres'))->name('padres');
Route::get('/maestros', fn() => view('maestros'))->name('maestros');
Route::get('/padresymaestros', fn() => view('padresymaestros'))->name('padresymaestros');
Route::get('/tda', fn() => view('tda'))->name('tda');
Route::get('/tdah', fn() => view('tdah'))->name('tdah');
Route::get('/adaptacion', fn() => view('adaptacion'))->name('adaptacion');

Route::get('/juegos/cerebro-3d', fn() => view('cerebro'))->name('juegos.cerebro');

Route::get('/experiencias/feed', [ExperienciaController::class, 'feed'])->name('experiencias.feed');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        $user = auth()->user();
        if ($user->role === 'especialista') return redirect()->route('especialista.inicio');
        if ($user->role === 'admin') return redirect()->route('admin.inicio');
        return redirect()->route('paciente.inicio');
    })->name('dashboard');

    Route::prefix('juegos')->name('juegos.')->group(function () {
        Route::get('/', [JuegoController::class, 'index'])->name('index');
        Route::get('/el-gran-orden',   [JuegoController::class, 'elGranOrden'])->name('el_gran_orden');
        Route::get('/volcan-interior', [JuegoController::class, 'volcanInterior'])->name('volcan_interior');
        Route::get('/ritmo-zen',       [JuegoController::class, 'ritmoZen'])->name('ritmo_zen');
    });

    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    Route::post('/chat/enviar', [ChatController::class, 'enviar'])->name('chat.enviar');

    Route::prefix('experiencias')->name('experiencias.')->group(function () {
        Route::get('/', [ExperienciaController::class, 'index'])->name('index');
        Route::get('/crear', [ExperienciaController::class, 'create'])->name('create');
        Route::post('/', [ExperienciaController::class, 'store'])->name('store');
        Route::get('/mias', [ExperienciaController::class, 'misPublicaciones'])->name('mias');
        Route::get('/{experiencia}', [ExperienciaController::class, 'show'])->name('show');
        Route::get('/{experiencia}/editar', [ExperienciaController::class, 'edit'])->name('edit');
        Route::put('/{experiencia}', [ExperienciaController::class, 'update'])->name('update');
        Route::delete('/{experiencia}', [ExperienciaController::class, 'destroy'])->name('destroy');
        Route::post('/{experiencia}/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');
        Route::delete('/{experiencia}/comentarios/{comentario}', [ComentarioController::class, 'destroy'])->name('comentarios.destroy');

    });

    Route::get('/desbaneo', [SolicitudDesbaneController::class, 'create'])->name('desbaneo.create');
    Route::post('/desbaneo', [SolicitudDesbaneController::class, 'store'])->name('desbaneo.store');

    Route::middleware(['role:usuario'])->prefix('paciente')->name('paciente.')->group(function () {
        Route::get('/inicio',     [PacienteController::class, 'inicio'])->name('inicio');
        Route::get('/perfil',     [PacienteController::class, 'perfil'])->name('perfil');
        Route::put('/cuenta',     [PacienteController::class, 'updateCuenta'])->name('update.cuenta');
        Route::get('/citas',      [PacienteController::class, 'citas'])->name('citas');
        Route::get('/calendario', [PacienteController::class, 'calendario'])->name('calendario');
        Route::get('/agenda',     [PacienteController::class, 'agenda'])->name('agenda');
        Route::get('/recursos',   [PacienteController::class, 'recursos'])->name('recursos');
        Route::get('/historial', [PacienteController::class, 'historial'])->name('historial');

        Route::get('/solicitudes',       [SolicitudPacienteController::class, 'index'])->name('solicitudes.index');
        Route::get('/solicitudes/crear', [SolicitudPacienteController::class, 'create'])->name('solicitudes.crear');
        Route::post('/solicitudes',      [SolicitudPacienteController::class, 'store'])->name('solicitudes.store');

        Route::get('/avisos',            [AvisoController::class, 'index'])->name('avisos.index');
        Route::post('/avisos/{id}/leer', [AvisoController::class, 'marcarLeida'])->name('avisos.leer');

        Route::get('/ser-especialista',  [SolicitudEspecialistaController::class, 'index'])->name('solicitud_especialista.index');
        Route::get('/ser-especialista/aplicar', [SolicitudEspecialistaController::class, 'create'])->name('solicitud_especialista.crear');
        Route::post('/ser-especialista', [SolicitudEspecialistaController::class, 'store'])->name('solicitud_especialista.store');
    });

    Route::middleware(['role:especialista'])->prefix('especialista')->name('especialista.')->group(function () {
        Route::get('/inicio', [EspecialistaPanelController::class, 'inicio'])->name('inicio');
        Route::get('/perfil',        [ProfesionalController::class, 'show'])->name('perfil');
        Route::get('/perfil/editar', [ProfesionalController::class, 'edit'])->name('perfil.editar');
        Route::put('/perfil',        [ProfesionalController::class, 'update'])->name('perfil.update');
        Route::get('/solicitudes',                      [EspecialistaSolicitudController::class, 'index'])->name('solicitudes.index');
        Route::post('/solicitudes/{solicitud}/aprobar', [EspecialistaSolicitudController::class, 'aprobar'])->name('solicitudes.aprobar');
        Route::post('/solicitudes/{solicitud}/rechazar',[EspecialistaSolicitudController::class, 'rechazar'])->name('solicitudes.rechazar');
        Route::get('/pacientes',                  [EspecialistaPacienteController::class, 'index'])->name('pacientes.index');
        Route::get('/pacientes/{paciente}',       [EspecialistaPacienteController::class, 'show'])->name('pacientes.show');
        Route::get('/pacientes/{paciente}/editar',[EspecialistaPacienteController::class, 'edit'])->name('pacientes.edit');
        Route::put('/pacientes/{paciente}',       [EspecialistaPacienteController::class, 'update'])->name('pacientes.update');
        Route::post('/pacientes/{paciente}/asignaciones', [EspecialistaAsignacionController::class, 'store'])->name('pacientes.asignaciones.store');
        Route::post('/pacientes/{paciente}/asignaciones/{asignacion}/completar', [EspecialistaAsignacionController::class, 'completar'])->name('pacientes.asignaciones.completar');
        Route::delete('/pacientes/{paciente}/asignaciones/{asignacion}', [EspecialistaAsignacionController::class, 'destroy'])->name('pacientes.asignaciones.destroy');
        Route::get('/citas',           [EspecialistaCitaController::class, 'index'])->name('citas.index');
        Route::post('/citas',          [EspecialistaCitaController::class, 'store'])->name('citas.store');
        Route::put('/citas/{cita}',    [EspecialistaCitaController::class, 'update'])->name('citas.update');
        Route::delete('/citas/{cita}', [EspecialistaCitaController::class, 'destroy'])->name('citas.destroy');
        Route::get('/notificaciones/{id}/leer',   [NotificacionController::class, 'marcarLeida'])->name('notificaciones.leer');
        Route::post('/notificaciones/leer-todas', [NotificacionController::class, 'marcarTodasLeidas'])->name('notificaciones.leer_todas');
    });

    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/inicio',       [AdminController::class, 'inicio'])->name('inicio');
        Route::get('/usuarios',     [AdminController::class, 'usuarios'])->name('usuarios');
        Route::put('/usuarios/{usuario}/rol', [AdminController::class, 'cambiarRol'])->name('usuarios.rol');
        Route::delete('/usuarios/{usuario}', [AdminController::class, 'eliminarUsuario'])->name('usuarios.destroy');
        Route::get('/pacientes',    [AdminController::class, 'pacientes'])->name('pacientes');
        Route::delete('/pacientes/{paciente}', [AdminController::class, 'eliminarPaciente'])->name('pacientes.destroy');
        Route::get('/profesionales',[AdminController::class, 'profesionales'])->name('profesionales');
        Route::delete('/profesionales/{profesional}', [AdminController::class, 'eliminarProfesional'])->name('profesionales.destroy');
        Route::get('/perfil',       [AdminPerfilController::class, 'show'])->name('perfil');
        Route::get('/perfil/editar',[AdminPerfilController::class, 'edit'])->name('perfil.editar');
        Route::put('/perfil',       [AdminPerfilController::class, 'update'])->name('perfil.update');
        Route::get('/citas',        [AdminController::class, 'citas'])->name('citas');
        Route::get('/solicitudes',  [AdminController::class, 'solicitudes'])->name('solicitudes');
        Route::get('/inbox',        [InboxController::class, 'index'])->name('inbox');
        Route::post('/inbox/especialista/{solicitud}/aprobar', [InboxController::class, 'aprobarEspecialista'])->name('inbox.especialista.aprobar');
        Route::post('/inbox/especialista/{solicitud}/rechazar',[InboxController::class, 'rechazarEspecialista'])->name('inbox.especialista.rechazar');
        Route::post('/inbox/desbaneo/{solicitud}/aprobar',     [InboxController::class, 'aprobarDesbaneo'])->name('inbox.desbaneo.aprobar');
        Route::post('/inbox/desbaneo/{solicitud}/rechazar',    [InboxController::class, 'rechazarDesbaneo'])->name('inbox.desbaneo.rechazar');
        Route::get('/experiencias', [AdminExperienciaController::class, 'index'])->name('experiencias.index');
        Route::post('/experiencias/{experiencia}/aprobar', [AdminExperienciaController::class, 'aprobar'])->name('experiencias.aprobar');
        Route::delete('/experiencias/{experiencia}', [AdminExperienciaController::class, 'destroy'])->name('experiencias.destroy');
        Route::get('/notificaciones/{id}/leer',   [AdminNotificacionController::class, 'marcarLeida'])->name('notificaciones.leer');
        Route::post('/notificaciones/leer-todas', [AdminNotificacionController::class, 'marcarTodasLeidas'])->name('notificaciones.leer_todas');
    });
});

require __DIR__.'/auth.php';
=======

Route::get('/', function () {
    return view('welcome');
});

// Rutas del profesional
Route::middleware('auth')->group(function () {
    Route::get('/profesional/perfil', [App\Http\Controllers\ProfesionalController::class, 'show'])->name('profesional.perfil');
    Route::get('/profesional/editar', [App\Http\Controllers\ProfesionalController::class, 'edit'])->name('profesional.editar');
    Route::put('/profesional/actualizar', [App\Http\Controllers\ProfesionalController::class, 'update'])->name('profesional.update');
});

// Rutas del paciente
Route::middleware('auth')->group(function () {
    Route::get('/pacientes', [App\Http\Controllers\PacienteController::class, 'index'])->name('paciente.index');
    Route::get('/pacientes/crear', [App\Http\Controllers\PacienteController::class, 'create'])->name('paciente.crear');
    Route::post('/pacientes', [App\Http\Controllers\PacienteController::class, 'store'])->name('paciente.store');
    Route::get('/pacientes/{id}/editar', [App\Http\Controllers\PacienteController::class, 'edit'])->name('paciente.editar');
    Route::put('/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'update'])->name('paciente.update');
    Route::delete('/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'destroy'])->name('paciente.destroy');
});

// Rutas del chat IA
Route::get('/chat', [App\Http\Controllers\ChatController::class, 'index'])->name('chat.index');
Route::post('/chat/enviar', [App\Http\Controllers\ChatController::class, 'enviar'])->name('chat.enviar');
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
