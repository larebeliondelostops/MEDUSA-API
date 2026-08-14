# Integracion front: categorias, subcategorias e incidentes

## Base URL y autenticacion

Todos los ejemplos usan la base del tenant:

```text
https://villavicencio.back.centralspike.com/api/v1
```

Los endpoints requieren JWT:

```http
Authorization: Bearer <accessToken>
```

Swagger esta disponible dentro del mismo tenant en:

```text
https://villavicencio.back.centralspike.com/api/v1/docs
```

## Flujo de seleccion

1. Consultar las categorias con `GET /indicators`.
2. Cuando el usuario elija una categoria, consultar `GET /indicators/{categoryId}/subindicators`.
3. Enviar el `id` de la subcategoria como `IndicatorId` al crear, editar o filtrar reportes.
4. No enviar `CategoryId` al backend. La categoria se deriva de `parent_indicator_id`.

## Consultar categorias

```http
GET /indicators
```

Retorna las 10 categorias ciudadanas (`1..10`). Sus IDs son los mismos usados en `tabs.key` del reporte. Los indicadores historicos de accidentalidad `11..15` no forman parte de este flujo.

## Consultar subcategorias

```http
GET /indicators/{categoryId}/subindicators
```

Ejemplo:

```http
GET /indicators/1/subindicators
```

El `id` de cada elemento retornado es el valor que debe enviarse como `IndicatorId`.

## Crear un incidente

```http
POST /incident/store
Content-Type: multipart/form-data
```

Campos:

| Campo | Tipo | Obligatorio | Descripcion |
| --- | --- | --- | --- |
| `IndicatorId` | integer | Si | ID de subcategoria. No acepta una categoria padre. |
| `description` | string | Si | Descripcion de la afectacion o necesidad. |
| `pointCoordinates` | string/GeoJSON | Si | Coordenadas en orden `longitud,latitud` o formato historico GeoJSON. |
| `address` | string | No | Direccion legible. |
| `image` | file | No | JPEG, PNG, JPG o GIF, maximo 2 MB. |

Ejemplo con `FormData`:

```javascript
const formData = new FormData();
formData.append('IndicatorId', String(subcategoryId));
formData.append('description', description);
formData.append('pointCoordinates', `${longitude},${latitude}`);

if (address) formData.append('address', address);
if (image) formData.append('image', image);

const response = await api.post('/incident/store', formData);
```

Respuesta `201`:

```json
{
  "status": "succes",
  "data": {
    "id": 35,
    "uuid": "3bb53717-64b9-4a18-aa24-70a206122bfd",
    "CategoryId": 1,
    "IndicatorId": 16,
    "category": {
      "id": 1,
      "name": "Vivienda o edificacion"
    },
    "subcategory": {
      "id": 16,
      "name": "Grietas visibles"
    },
    "address": "Calle 40 # 20-15",
    "description": "Se observan grietas visibles.",
    "pointCoordinates": "-73.6379, 4.1420"
  }
}
```

La respuesta conserva tambien los atributos historicos del incidente. Al guardar se limpia la cache general de reportes para que el registro aparezca inmediatamente.

## Editar un incidente

```http
POST /incident/update/{id}
Content-Type: multipart/form-data
```

Acepta ID numerico o UUID. Los campos son opcionales, pero si se envia `IndicatorId` debe ser una subcategoria valida.

## Listado

```http
GET /incident/allTable?start=2026-01-01&end=2026-08-14&count=10&page=1
```

Cada fila contiene:

```json
{
  "ID": 34,
  "Nombre": "Descripcion test",
  "Categoria": "Vivienda o edificacion",
  "Subcategoria": "Grietas visibles",
  "Direccion": "Calle 40",
  "Fecha": "2026-08-13"
}
```

La llave duplicada `Indicador` fue eliminada. Los incidentes historicos deben tener ejecutado el backfill para que `Subcategoria` no sea `null`.

`meta.ableCreate` retorna `true`, por lo que la web puede mostrar la accion de creacion y enviar el formulario a `POST /incident/store`.

## Reportes por subcategoria

```http
POST /report/getReportsData/incident
Content-Type: application/json
```

Sin filtro mantiene el comportamiento anterior:

```json
{
  "start": "2026-01-01T00:00:00-05:00",
  "end": "2026-08-14T23:59:59-05:00"
}
```

Con filtro:

```json
{
  "start": "2026-01-01T00:00:00-05:00",
  "end": "2026-08-14T23:59:59-05:00",
  "IndicatorId": 16
}
```

El filtro afecta todo el payload: `tabs.series`, tarjetas, graficas, matrices y puntos. Las categorias diferentes a la subcategoria elegida quedan con conteo cero.

En `tabs.key`, `0` identifica la pestana General. Los otros diez valores son los IDs reales de las categorias ciudadanas retornadas por `GET /indicators`, no posiciones del arreglo. Los indicadores historicos `11..15` se excluyen tambien del conteo general.

## Errores relevantes

| HTTP | Significado |
| --- | --- |
| `400` | Faltan campos o la subcategoria no es valida en el endpoint dedicado. |
| `401` | JWT ausente, invalido o expirado. |
| `404` | La subcategoria solicitada en reportes no existe. |
| `422` | Coordenadas invalidas o error de validacion. |
| `429` | Limite de creacion de incidentes alcanzado temporalmente. |

Al recibir `401`, el front debe renovar el token con `POST /auth/refresh` usando el `refreshToken` como Bearer y repetir la solicitud original una sola vez.
