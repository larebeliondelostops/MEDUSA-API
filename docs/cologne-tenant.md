# Tenant de Colonia

La sincronizacion crea o actualiza unicamente el tenant indicado. Ejecuta las
migraciones comunes, la migracion geografica de Colonia, importa las identidades
heredadas de Villavicencio y carga los archivos de `database/data/cologne`.

```bash
php artisan tenant:sync-cologne --tenant=cologne
```

Desde el entorno Docker del proyecto:

```bash
docker exec medusa-app php artisan tenant:sync-cologne --tenant=cologne --no-interaction
```

Para asociar un dominio en la misma operacion:

```bash
php artisan tenant:sync-cologne --tenant=cologne --domain=cologne.example.com
```

## Garantias de repeticion

- Los usuarios, roles, permisos y pivotes usan inserciones tolerantes a registros existentes.
- Los marcadores reservan los IDs 200 a 212 y detienen la operacion ante una colision, sin sobrescribir el registro ajeno.
- La geodata usa la clave unica `(dataset, source_key)` y solo escribe cuando cambia el hash del registro.
- Los registros que desaparezcan de un archivo fuente no se eliminan automaticamente.
- Los tres archivos fuente vacios conservan su marcador y cualquier dato previamente cargado.
- Las filas sin coordenadas o con coordenadas fuera del area esperada se conservan con geometria `None`.
- El rollback de la migracion geografica no elimina `cologne_geodata`; una eliminacion debe ser explicita.

Los JSON de ArcGIS se convierten de EPSG:25832 a WGS84. El CSV de semaforos
normaliza primero el formato numerico publicado por la fuente y despues usa la
misma conversion. Los parquimetros ya vienen en WGS84.
