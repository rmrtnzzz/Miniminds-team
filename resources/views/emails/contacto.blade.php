<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f5f0ff; margin: 0; padding: 30px; }
        .card { background: #fff; border-radius: 16px; padding: 32px; max-width: 560px; margin: 0 auto; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
        .logo { font-size: 22px; font-weight: 800; color: #7C5CBF; margin-bottom: 24px; }
        h2 { color: #4A4063; font-size: 18px; margin: 0 0 20px; }
        .campo { margin-bottom: 14px; }
        .label { font-size: 11px; font-weight: 700; color: #9a8fb8; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 4px; }
        .valor { font-size: 15px; color: #4A4063; }
        .mensaje-box { background: #f5f0ff; border-radius: 10px; padding: 16px; margin-top: 16px; font-size: 14px; color: #4A4063; line-height: 1.6; }
        .footer { margin-top: 24px; font-size: 12px; color: #9a8fb8; text-align: center; }
    </style>
</head>
<body>
    <div class="card">
        <div class="logo">Miniminds!</div>
        <h2>Nuevo mensaje de contacto</h2>

        <div class="campo">
            <div class="label">Nombre completo</div>
            <div class="valor">{{ $datos['nombre'] }} {{ $datos['apellido'] }}</div>
        </div>

        <div class="campo">
            <div class="label">Correo electrónico</div>
            <div class="valor">{{ $datos['correo'] }}</div>
        </div>

        @if(!empty($datos['telefono']))
        <div class="campo">
            <div class="label">Teléfono</div>
            <div class="valor">{{ $datos['telefono'] }}</div>
        </div>
        @endif

        <div class="campo">
            <div class="label">Mensaje</div>
            <div class="mensaje-box">{{ $datos['mensaje'] }}</div>
        </div>

        <div class="footer">Miniminds — Apoyo a infancias adaptivas</div>
    </div>
</body>
</html>
