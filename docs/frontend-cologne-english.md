# Integracion front: tenant `cologne` en ingles

## Objetivo

El tenant `cologne` ahora debe consumirse como un tenant monolingue en ingles.
No se implemento negociacion por `Accept-Language` ni contenido bilingue por
registro. La regla es simple:

- `cologne` devuelve catalogos y textos del backend en ingles.
- Otros tenants mantienen su comportamiento actual.

Esto significa que el front no debe intentar traducir estos datos ni esperar
dos versiones del mismo contenido desde la API.

## Base URL y autenticacion

Todos los ejemplos usan la base del tenant:

```text
https://cologne.back.centralspike.com/api/v1
```

Los endpoints autenticados siguen usando JWT:

```http
Authorization: Bearer <accessToken>
```

Swagger sigue disponible dentro del mismo tenant:

```text
https://cologne.back.centralspike.com/api/v1/docs
```

## Que cambia para el front

En `cologne`, el backend ya entrega en ingles:

- Menu principal: `Map`, `Markers`, `Users`
- Capas principales de mapa: `Traffic lights`, `Parking meters`
- Roles: `Administrator`
- Formularios: nombres, placeholders y opciones de `select`
- Indicadores y subindicadores de incidentes
- Tablas de incidentes: headers y valores de categoria/subcategoria
- Reportes de incidentes: tabs, labels, titles, weekdays, months y textos de apoyo
- Mensajes de error del backend cuando el flujo ya fue adaptado a `TenantLanguage`
- Infobox de geodata de `cologne`: `title`, llaves y valores de `properties`

Tambien se ajusto en `cologne`:

- El dominio `Markers` ya expone labels en ingles, pero el front no resuelve una
  vista en `/dashboard/markers` a secas.
- La navegacion de `Markers` debe construirse con submenus por tipo
  (`markers/{slug}`) o apuntando directo a un slug concreto.
- `Traffic lights` y `Parking meters` ya no dependen de `specialType` para agruparse.

## Que no cambia

Estos contratos siguen iguales:

- El front sigue apuntando al tenant por dominio, no por header de idioma.
- No se debe enviar `Accept-Language` para activar ingles.
- Los endpoints y payloads base no cambiaron solo por idioma.
- El `id` de categorias y subcategorias sigue siendo el dato contractual.

## Que no se traduce automaticamente

Estos campos pueden seguir llegando en el idioma en que fueron escritos por el
usuario:

- `description` de incidentes
- `address` de incidentes

El front debe tratarlos como contenido libre, no como strings del sistema.

## Consumo recomendado por modulo

## Menu

Endpoint usado por la web:

```http
GET /menu/menuBar
```

`GET /menu/all` sigue existiendo hoy y no debe quitarse si hay otros
consumidores, pero la web actual consume `GET /menu/menuBar`.

En `cologne`, el front debe esperar labels en ingles como:

```json
[
  { "name": "Map", "path": "map" },
  { "name": "Users", "path": "users" }
]
```

No hay que mapear `Mapa -> Map` ni `Marcadores -> Markers` en cliente.

Para `Markers`, el contrato correcto para la web es uno de estos dos:

1. Devolver un padre `Markers` con submenus por tipo, por ejemplo:

```json
{
  "name": "Markers",
  "path": null,
  "children": [
    { "name": "Traffic lights", "path": "markers/traffic-lights" },
    { "name": "Parking meters", "path": "markers/parking-meters" }
  ]
}
```

2. O apuntar cada entrada del menu directo a un slug concreto.

No se debe asumir que `path = "markers"` navega a una tabla valida en el front.

## Formularios dinamicos

Endpoint:

```http
GET /form/{slug}
```

En `cologne`, el backend ya devuelve:

- `field.name` en ingles
- `field.placeholder` en ingles
- `options[].label` en ingles para roles, indicadores y subindicadores

El front debe renderizar esos valores tal cual llegan.

## Indicadores y subindicadores

Endpoints:

```http
GET /indicators
GET /indicators/{categoryId}/subindicators
```

En `cologne` existen las mismas categorias funcionales que Territorio Conecta,
pero en ingles. El contrato para el front es:

1. Consultar categorias con `GET /indicators`.
2. Al seleccionar una categoria, consultar `GET /indicators/{categoryId}/subindicators`.
3. Enviar el `id` de la subcategoria como `IndicatorId`.
4. No enviar `CategoryId`; el backend la deriva con `parent_indicator_id`.

Ejemplo de categoria:

```json
{
  "id": 1,
  "name": "Housing or building",
  "description": "Damage to houses, apartments, buildings or structures.",
  "subindicators_count": 10
}
```

Ejemplo de subcategoria:

```json
{
  "id": 11,
  "name": "Visible cracks",
  "description": null,
  "parent_indicator_id": 1
}
```

## Incidentes

Endpoints principales:

```http
GET /incident/allTable
POST /incident/store
POST /incident/update/{id}
```

En `cologne`, la tabla de incidentes ya devuelve headers en ingles:

```json
{
  "ID": 35,
  "Name": "Water leak near the entrance",
  "Category": "Water and sanitation",
  "Subcategory": "Broken pipe or water leak",
  "Address": "Street 10",
  "Date": "2026-08-26"
}
```

Para crear o editar, el front debe seguir enviando:

```text
IndicatorId
description
pointCoordinates
address
image
```

Solo cambia el idioma visible del formulario y de las respuestas.

## Reportes de incidentes

Endpoint:

```http
POST /report/getReportsData/incident
```

En `cologne`, el backend ya devuelve en ingles:

- `tabs.labels`
- Titulos de graficas
- Etiquetas de meses
- Etiquetas de dias
- Series por categoria/subcategoria
- Textos como `General`, `Historical`, `No indicator`

El front debe renderizar esos textos tal cual, sin tabla local de traducciones.

## Markers y mapa

Endpoints relacionados:

```http
GET /menu/menuBar
GET /markers
GET /markers/{slug}
GET /{slug}/allTable
```

Para `cologne`:

- Las capas `Traffic lights` y `Parking meters` deben mostrarse ya con ese nombre.
- La navegacion del modulo debe resolver a rutas tipo `/dashboard/markers/{slug}`.
- La tabla de cada tipo consume `/{slug}/allTable`.
- No se debe depender de `specialType = 1` para esas dos capas.
- El agrupamiento debe seguir funcionando con la logica por cantidad ya existente.

## Manejo de errores

En `cologne`, varios mensajes del backend ya salen en ingles. Aun asi, el front
debe seguir manejarlos por codigo HTTP cuando sea posible, no solo por el texto
de `message`.

Casos esperados:

- `400` campos faltantes o request invalida
- `401` token ausente, invalido o expirado
- `404` slug, modulo, indicador o incidente no encontrado
- `422` error de validacion
- `429` limite temporal de creacion de incidentes
- `500` error interno

Recomendacion:

- Usa `message` para mostrar feedback al usuario.
- Usa `status code` para la logica de negocio del front.

## Recomendaciones de implementacion en front

- No agregues una capa extra de i18n para datos de `cologne` que ya llegan en ingles desde la API.
- Manten la seleccion por `id` para categorias y subcategorias; no dependas del `name`.
- Trata `description` y `address` como texto libre del usuario.
- Si compartes componentes entre tenants, deja que el label visible venga del backend.
- Si cacheas respuestas por tenant, separa cache de `cologne` frente a otros tenants.

## Checklist de QA para `cologne`

- El menu muestra `Map`, `Markers`, `Users`.
- `Markers` aparece visible como padre con submenus, o cada opcion navega directo
  a un slug valido.
- Ninguna opcion del menu intenta navegar a `/dashboard/markers` a secas.
- Las tablas de markers cargan usando `/{slug}/allTable`.
- Las capas muestran `Traffic lights` y `Parking meters`.
- El formulario de incidentes muestra categorias y subcategorias en ingles.
- Al guardar un incidente, la respuesta devuelve `category.name` y `subcategory.name` en ingles.
- La tabla de incidentes muestra columnas `Name`, `Category`, `Subcategory`, `Address`, `Date`.
- El reporte de incidentes muestra tabs, charts, months y weekdays en ingles.
- Los textos libres escritos por usuarios no se traducen automaticamente.

## Resumen operativo

Para el front, `cologne` debe tratarse como un tenant cuyo contenido de sistema
ya viene resuelto en ingles desde backend. El consumo correcto es renderizar esos
strings tal cual llegan y seguir usando los mismos endpoints y IDs contractuales,
pero sin asumir una ruta plana `/dashboard/markers`.
