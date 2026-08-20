# Integración de moderación + CRUD de Experiencias — Miniminds

Este paquete contiene **solo los archivos nuevos o modificados**, ya con las rutas
exactas dentro de tu proyecto (basta con extraer sobre la carpeta raíz de tu
backend y sobrescribir).

## 🐛 Bug real que encontré y arreglé

El chat con las mascotas de IA (`resources/views/chat/chat.blade.php`) llama en su
JS a `POST /chat/enviar`, pero esa ruta **nunca estaba registrada** en
`routes/web.php` (404 garantizado). Además, `ChatController::index()` apuntaba a
una vista `chat.index` que no existe (la vista real es `chat.chat`). Ya corregí
ambas cosas — el chat ahora es alcanzable.

## 🛡️ Sistema de moderación (resumen de la lógica)

1. **1ra infracción** → correo + "cartita" en el inbox del usuario: aviso de
   precaución. No se banea.
2. **2da infracción** → baneo temporal de 24h.
3. **3ra infracción** → baneo temporal de 72h.
4. **Al llegar al 3er baneo** → baneo permanente + se guarda la IP en
   `ips_baneadas` (bloquea incluso a invitados desde esa red).
5. Cada infracción (aviso, temporal o permanente) también le llega a **todos
   los admins** como notificación, con una vista previa de la experiencia
   bloqueada.
6. El middleware `CheckBanned` (registrado globalmente en `Kernel.php`) bloquea
   la navegación completa mostrando `errores.restringido` ("Acceso
   restringido") a usuarios baneados o IPs baneadas.

Ajusta la lista de palabras y dominios permitidos en `config/moderacion.php`.

## 💬 CRUD de Experiencias (donde se aplica la moderación)

Nuevo, disponible para cualquier rol autenticado (usuario, especialista, admin)
en `/experiencias`:
- Listar, crear, ver, editar y eliminar experiencias propias.
- `store` y `update` pasan el texto por `FiltroContenidoService` antes de
  guardar. Si se detecta algo, la experiencia se guarda igual pero con
  `estado = bloqueada` (así el admin ve el contenido real) y se dispara
  `BaneoService::registrarInfraccion()`.
- El admin revisa lo bloqueado en `/admin/experiencias` y puede **aprobar**
  (falso positivo) o **eliminar definitivamente**.

## 📬 Los dos inboxes

- **Usuario**: página dedicada `/paciente/avisos` (las "cartitas"), más una
  campanita en el header del layout de paciente — reutiliza el mismo sistema
  de notificaciones (`notifications` table) que ya usas para
  `SolicitudPacienteResuelta`, no crea una tabla nueva.
- **Admin**: campanita nueva en el header del layout de admin + página
  `/admin/experiencias` con la vista previa completa de cada caso.

## Pasos para aplicar

1. Extrae este zip sobre la raíz de tu proyecto (sobrescribe los archivos
   existentes que coincidan: `User.php`, `Kernel.php`, `routes/web.php`,
   `ChatController.php` y los tres `layouts/*.blade.php`).
2. Corre las migraciones nuevas:
   ```bash
   php artisan migrate
   ```
3. Revisa/completa `config/moderacion.php` con tus propias palabras y
   dominios permitidos.
4. Asegúrate de tener `MAIL_MAILER` configurado en tu `.env` para que el
   correo de `AvisoInfraccion` se pueda enviar (usa el canal `mail` además de
   `database`, sin necesidad de una clase `Mailable` aparte).
5. Prueba el flujo: publica una experiencia con una palabra de la lista de
   `config/moderacion.php` y verifica que:
   - la experiencia queda con `estado = bloqueada`,
   - te llega la cartita de aviso en `/paciente/avisos`,
   - el admin la ve en `/admin/experiencias`.

## Archivos incluidos

**Nuevos:**
```
database/migrations/2026_07_28_000001_add_moderacion_fields_to_users_table.php
database/migrations/2026_07_28_000002_create_ips_baneadas_table.php
database/migrations/2026_07_28_000003_create_experiencias_table.php
app/Models/IpBaneada.php
app/Models/Experiencia.php
config/moderacion.php
app/Services/FiltroContenidoService.php
app/Services/BaneoService.php
app/Notifications/AvisoInfraccion.php
app/Notifications/PosibleInfraccion.php
app/Http/Middleware/CheckBanned.php
resources/views/errores/restringido.blade.php
app/Http/Controllers/ExperienciaController.php
app/Http/Controllers/Admin/AdminExperienciaController.php
app/Http/Controllers/Usuario/AvisoController.php
app/Http/Controllers/Admin/NotificacionController.php
resources/views/experiencias/index.blade.php
resources/views/experiencias/create.blade.php
resources/views/experiencias/edit.blade.php
resources/views/experiencias/show.blade.php
resources/views/admin/experiencias/index.blade.php
resources/views/paciente/avisos/index.blade.php
```

**Modificados:**
```
app/Models/User.php                      (campos + relación + helpers de baneo)
app/Http/Kernel.php                      (registra CheckBanned en el grupo 'web')
app/Http/Controllers/ChatController.php  (arreglado el bug de la vista)
routes/web.php                           (rutas de chat, experiencias, avisos, admin)
resources/views/layouts/paciente.blade.php     (campanita + sidebar)
resources/views/layouts/especialista.blade.php (sidebar)
resources/views/layouts/admin.blade.php        (campanita + sidebar)
```
