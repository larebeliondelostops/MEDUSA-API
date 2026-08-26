# Guia front: funcionalidades habilitadas para `cologne`

## Base y autenticacion

```text
API: https://cologne.back.centralspike.com/api/v1
Broadcast auth: https://cologne.back.centralspike.com/broadcasting/auth
```

Todas las rutas protegidas usan:

```http
Authorization: Bearer <accessToken>
```

El backend resuelve el ingles por dominio. No envies `Accept-Language` y no
traduzcas labels de catalogos en el cliente.

## Menu

```http
GET /menu/menuBar
```

`GET /menu/all` se conserva como alias compatible, pero la ruta canonica para
la web es `GET /menu/menuBar`.

`Markers` llega como padre sin ruta directa:

```json
{
  "id": "5",
  "name": "Markers",
  "path": null,
  "icon": "place",
  "slug": "markers",
  "submenu": [
    {
      "identifier": "5-traffic_lights",
      "level": 2,
      "name": "Traffic lights",
      "path": "markers/traffic_lights",
      "icon": "traffic",
      "slug": "traffic_lights",
      "enabled": true
    },
    {
      "identifier": "5-parking_ticket_machines",
      "level": 2,
      "name": "Parking meters",
      "path": "markers/parking_ticket_machines",
      "icon": "local_parking",
      "slug": "parking_ticket_machines",
      "enabled": true
    }
  ]
}
```

Usa `id` para controlar el submenu abierto e `icon` como Material Symbol. No
navegues a `/dashboard/markers` sin slug.

## Tablas de markers

```http
GET /traffic_lights/allTable?count=10&page=1
GET /parking_ticket_machines/allTable?count=10&page=1
```

Son tablas de solo lectura. `meta.ableCreate`, `meta.ableEdit` y
`meta.ableDelete` son `false`.

## Capas del mapa

```http
GET /menu/commandBar
GET /allData/allPoints
GET /allData/allPolygons
GET /allData/getInfoPoint?id={uuid}&markerType={markerId}
```

`Traffic lights` y `Parking meters` no dependen de `specialType`. El front usa
la cantidad: con 100 elementos no agrupa y desde 101 agrupa (`count > 100`).

## Formulario de incidentes

```http
GET /form/incident
GET /indicators
GET /indicators/{categoryId}/subindicators
```

El formulario devuelve `IndicatorId`, `address`, `description` y
`pointCoordinates`. No devuelve ni debe enviar `CategoryId`.

Para crear o editar usa `multipart/form-data`:

```http
POST /incident/store
POST /incident/update/{id}
```

Campos:

```text
IndicatorId        requerido, id de subcategoria
description        requerido al crear
pointCoordinates   requerido al crear
address            opcional
image              opcional, jpeg/png/jpg/gif, maximo 2 MB
```

`description` y `address` son texto libre y nunca se traducen automaticamente.

## Incidentes y reportes

```http
GET /incident/allTable
GET /incident/show/{id-or-uuid}
POST /report/getReportsData/incident
```

La tabla, categorias, subcategorias, meses, dias y titulos del reporte llegan en
ingles. La logica cliente debe depender de IDs y status HTTP, no del texto.

## Usuarios

```http
GET /form/users
GET /user/all
GET /user/getUser/{id}
POST /user/store
POST /user/update/{id}
DELETE /user/destroy/{id}
```

Tambien se conserva `GET /form/user` para compatibilidad historica. El formulario
usa las claves `name`, `email`, `role_id`, `phone_number` y `password`; las
opciones de rol llegan en ingles desde el backend.

## WebSockets

Instala `laravel-echo` y `pusher-js`. Configuracion de referencia:

```js
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

export function createTenantEcho({ token, tenantId }) {
  return new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    wsHost: import.meta.env.VITE_PUSHER_HOST,
    wsPort: Number(import.meta.env.VITE_PUSHER_PORT ?? 80),
    wssPort: Number(import.meta.env.VITE_PUSHER_WSS_PORT ?? 443),
    forceTLS: true,
    enabledTransports: ['ws', 'wss'],
    disableStats: true,
    authEndpoint: 'https://cologne.back.centralspike.com/broadcasting/auth',
    auth: {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    },
  });
}
```

Suscripcion:

```js
const echo = createTenantEcho({ token, tenantId: 'cologne' });
const channel = echo.private('tenant.cologne.incidents');

channel
  .listen('.incident.created', ({ incident }) => refreshIncident(incident))
  .listen('.incident.updated', ({ incident }) => refreshIncident(incident))
  .listen('.incident.deleted', ({ incident }) => removeIncident(incident))
  .listen('.incident.reviewed', ({ incident }) => refreshIncident(incident));
```

Al cerrar sesion o cambiar tenant:

```js
echo.leave('tenant.cologne.incidents');
echo.disconnect();
```

Nunca construyas el canal desde un tenant almacenado sin validar. Usa el tenant
activo de la sesion y deja que `/broadcasting/auth` rechace cualquier cruce.

El alta, edicion o eliminacion por HTTP debe considerarse exitosa por su respuesta
HTTP. El WebSocket sirve para sincronizar otras sesiones abiertas; no reemplaza
la confirmacion del request que origino el cambio.

## Manejo de errores

```text
400 request invalida
401 JWT ausente, invalido o expirado
403 token o canal de otro tenant
404 recurso inexistente
405 dataset de Cologne de solo lectura
422 validacion
429 limite temporal de incidentes
500 error interno
```

## QA minimo

1. `Markers` abre y conserva su estado usando `id`.
2. Ambos submenus muestran Material Symbols y abren su tabla.
3. Las tablas no ofrecen crear, editar ni eliminar.
4. Las capas cargan y el borde 100/101 se comporta como fue definido.
5. Un incidente se crea con foto desde movil.
6. Categoria y subcategoria aparecen en ingles y solo se envia `IndicatorId`.
7. Crear, editar, revisar y eliminar produce el evento WebSocket correspondiente.
8. Un token de otro tenant no puede autorizar el canal de Cologne.
