# WebSockets multi-tenant: despliegue y operacion

## Alcance

Los cambios de incidentes se publican en un canal privado separado por tenant:

```text
private-tenant.{tenantId}.incidents
```

Laravel Echo recibe el nombre sin el prefijo `private-`:

```text
tenant.{tenantId}.incidents
```

Eventos disponibles:

```text
incident.created
incident.updated
incident.deleted
incident.reviewed
```

Los eventos personales existentes tambien quedan aislados:

```text
tenant.{tenantId}.users.{sha256(email)}.alerts     evento .alerts
tenant.{tenantId}.users.{sha256(email)}.incidents  evento .newIncident
```

Los antiguos canales publicos `private_channel_{email}` dejan de utilizarse.

El payload tiene esta forma:

```json
{
  "tenant": "cologne",
  "action": "created",
  "incident": {
    "uuid": "85c9dfaf-f6cb-491a-837d-cc98ee7e5fce",
    "IndicatorId": 33,
    "CategoryId": 3,
    "description": "Water leak",
    "address": "Street 10",
    "pointCoordinates": "6.9603, 50.9375"
  }
}
```

La entrega usa `ShouldBroadcastNow`. No necesita un queue worker y conserva el
tenant activo de la peticion. Si el servidor WebSocket no esta disponible, el
incidente permanece guardado y el fallo de broadcasting se registra como warning.

## Variables de entorno

Ejemplo usando el servidor BeyondCode incluido en el proyecto:

```dotenv
BROADCAST_DRIVER=pusher

PUSHER_APP_ID=medusa
PUSHER_APP_KEY=replace-with-a-public-key
PUSHER_APP_SECRET=replace-with-a-private-secret
PUSHER_APP_CLUSTER=mt1
PUSHER_HOST=127.0.0.1
PUSHER_PORT=6001
PUSHER_SCHEME=http

LARAVEL_WEBSOCKETS_PORT=6001
LARAVEL_WEBSOCKETS_DOMAIN=back.centralspike.com
WEBSOCKETS_ALLOWED_ORIGINS=https://cologne.centralspike.com
WEBSOCKETS_STATISTICS=false
```

`PUSHER_APP_KEY` se comparte con el front. `PUSHER_APP_SECRET` nunca se expone
al navegador.

Si varios frontends usan el mismo backend, `WEBSOCKETS_ALLOWED_ORIGINS` acepta
una lista separada por comas.

## Despliegue de Cologne

```bash
composer install --no-dev --optimize-autoloader
php artisan tenant:sync-cologne --tenant=cologne
php artisan optimize:clear
php artisan config:cache
```

El comando de sincronizacion aplica las migraciones tenant y Cologne, crea la
tabla `incident`, alinea formularios, registra los CRUD de geodata y ejecuta el
seeder idempotente.

## Proceso WebSocket

Prueba manual:

```bash
php artisan websockets:serve --host=127.0.0.1 --port=6001
```

En produccion debe ejecutarse con Supervisor o systemd. Ejemplo Supervisor:

```ini
[program:medusa-websockets]
command=php /var/www/artisan websockets:serve --host=127.0.0.1 --port=6001
directory=/var/www
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=www-data
redirect_stderr=true
stdout_logfile=/var/log/supervisor/medusa-websockets.log
```

Despues de cambiar `.env` o `config/websockets.php`, reinicia este proceso.

## Proxy WSS

El certificado TLS puede terminar en Nginx y el proceso PHP puede permanecer en
HTTP local. Configuracion de referencia:

```nginx
location /app/ {
    proxy_pass http://127.0.0.1:6001;
    proxy_http_version 1.1;
    proxy_set_header Upgrade $http_upgrade;
    proxy_set_header Connection "Upgrade";
    proxy_set_header Host $host;
    proxy_read_timeout 600s;
}

location /apps/ {
    proxy_pass http://127.0.0.1:6001;
    proxy_http_version 1.1;
    proxy_set_header Host $host;
}
```

El endpoint `/broadcasting/auth` debe continuar dirigido a Laravel, no al
proceso WebSocket.

## Seguridad tenant

La autorizacion del canal ejecuta estas validaciones:

1. El dominio inicializa el tenant correspondiente.
2. `jwt.verify` autentica el usuario.
3. El `tenant_id` del JWT debe coincidir con el dominio.
4. El parametro del canal debe coincidir con `tenant('id')`.

Un token de otro tenant recibe `403` y no puede autorizar la suscripcion.

## Verificacion

1. Confirma que el proceso escucha en `127.0.0.1:6001`.
2. Abre DevTools, `Network`, filtro `WS`, y confirma un handshake `101`.
3. Confirma que `POST /broadcasting/auth` responde `200` con JWT valido.
4. Crea un incidente en Cologne y observa `incident.created`.
5. Edita, revisa y elimina el incidente para validar los otros eventos.
6. Intenta autorizar `tenant.cologne.incidents` usando un token de otro tenant;
   debe fallar.

Comandos utiles:

```bash
php artisan route:list | grep broadcasting
supervisorctl status medusa-websockets
tail -f storage/logs/laravel.log
tail -f /var/log/supervisor/medusa-websockets.log
```

## Fallos comunes

- Sin conexion WS: proceso detenido, proxy sin headers Upgrade o puerto errado.
- Conecta pero no recibe: `BROADCAST_DRIVER=null`, canal o evento incorrecto.
- `401`: falta `Authorization: Bearer <token>` en `broadcasting/auth`.
- `403`: token, dominio y canal pertenecen a tenants distintos.
- Evento guardado pero no emitido: revisar warnings `Unable to broadcast tenant incident event`.
- Cambios de `.env` ignorados: ejecutar `php artisan optimize:clear`, volver a
  cachear configuracion y reiniciar WebSockets.

## Error externo de IPATS

El comando `save:ipats` ya limita su ejecucion al tenant `villavicencio`. Un log
de `getaddrinfo for api.movilidadvillavicencio.gov.co failed` corresponde a una
falla temporal de DNS o disponibilidad de ese proveedor externo. No participa
en el guardado de incidentes, en Cologne ni en el servidor WebSocket.
