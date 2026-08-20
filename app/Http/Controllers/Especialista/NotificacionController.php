<?php

namespace App\Http\Controllers\Especialista;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    
    public function marcarLeida(Request $request, string $id)
    {
        $notificacion = $request->user()->notifications()->where('id', $id)->firstOrFail();
        $notificacion->markAsRead();

        return redirect($notificacion->data['url'] ?? route('especialista.inicio'));
    }

    
    public function marcarTodasLeidas(Request $request)
    {
        $request->user()->unreadNotifications->markAsRead();

        return back();
    }
}
