<?php

namespace Database\Seeders;

use App\Strategies\StrategiesPoints\Cologne\StrategyCologneGeodata;
use App\Strategies\StrategiesPolygons\Cologne\StrategyCologneParks;
use Database\Seeders\Villavicencio\ModelHasPermissionsTableSeeder;
use Database\Seeders\Villavicencio\ModelHasRolesTableSeeder;
use Database\Seeders\Villavicencio\PermissionsSeeder;
use Database\Seeders\Villavicencio\RoleHasPermissionsTableSeeder;
use Database\Seeders\Villavicencio\RolesTableSeeder;
use Database\Seeders\Villavicencio\UsersTableSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use RuntimeException;
use Spatie\Permission\PermissionRegistrar;

class CologneSeeder extends Seeder
{
    private const POINT_STRATEGY = StrategyCologneGeodata::class;

    private const CATALOG = [
        200 => ['dataset' => 'refugee_accommodation', 'name' => 'Alojamiento para refugiados', 'icon' => 'home', 'color' => 'orange', 'type' => 1, 'namespace' => self::POINT_STRATEGY],
        201 => ['dataset' => 'bus_parking', 'name' => 'Aparcamiento de autobuses', 'icon' => 'directions_bus', 'color' => 'blue', 'type' => 1, 'namespace' => self::POINT_STRATEGY],
        202 => ['dataset' => 'libraries', 'name' => 'Bibliotecas', 'icon' => 'local_library', 'color' => 'purple', 'type' => 1, 'namespace' => self::POINT_STRATEGY],
        203 => ['dataset' => 'intercultural_centers', 'name' => 'Centros interculturales', 'icon' => 'groups', 'color' => 'teal', 'type' => 1, 'namespace' => self::POINT_STRATEGY],
        204 => ['dataset' => 'cemetery_entrances', 'name' => 'Entradas de cementerios', 'icon' => 'door_front', 'color' => 'grey', 'type' => 1, 'namespace' => self::POINT_STRATEGY],
        205 => ['dataset' => 'schools', 'name' => 'Escuelas', 'icon' => 'school', 'color' => 'yellow', 'type' => 1, 'namespace' => self::POINT_STRATEGY],
        206 => ['dataset' => 'hospitals', 'name' => 'Hospitales', 'icon' => 'local_hospital', 'color' => 'red', 'type' => 1, 'namespace' => self::POINT_STRATEGY],
        207 => ['dataset' => 'natural_monuments', 'name' => 'Monumentos naturales', 'icon' => 'nature', 'color' => 'green', 'type' => 1, 'namespace' => self::POINT_STRATEGY],
        208 => ['dataset' => 'museums', 'name' => 'Museos', 'icon' => 'museum', 'color' => 'brown', 'type' => 1, 'namespace' => self::POINT_STRATEGY],
        209 => ['dataset' => 'parking_ticket_machines', 'name' => 'Parquimetros', 'icon' => 'local_parking', 'color' => 'indigo', 'type' => 1, 'namespace' => self::POINT_STRATEGY],
        210 => ['dataset' => 'parks', 'name' => 'Parques', 'icon' => 'park', 'color' => 'green', 'type' => 3, 'namespace' => StrategyCologneParks::class],
        211 => ['dataset' => 'wifi_access_points', 'name' => 'Puntos de acceso WiFi', 'icon' => 'wifi', 'color' => 'cyan', 'type' => 1, 'namespace' => self::POINT_STRATEGY],
        212 => ['dataset' => 'traffic_lights', 'name' => 'Semaforos', 'icon' => 'traffic', 'color' => 'bluegreen', 'type' => 1, 'namespace' => self::POINT_STRATEGY],
    ];

    private const ESRI_SOURCES = [
        'refugee_accommodation' => ['file' => 'refugee_accommodation.json', 'name' => 'strassenname'],
        'bus_parking' => ['file' => 'bus_parking.json', 'name' => 'name'],
        'libraries' => ['file' => 'libraries.json', 'name' => 'name'],
        'intercultural_centers' => ['file' => 'intercultural_centers.json', 'name' => 'z_name'],
        'cemetery_entrances' => ['file' => 'cemetery_entrances.json', 'name' => 'name'],
        'schools' => ['file' => 'schools.json', 'name' => 'name'],
        'hospitals' => ['file' => 'hospitals.json', 'name' => 'name'],
        'natural_monuments' => ['file' => 'natural_monuments.json', 'name' => 'beschr'],
        'museums' => ['file' => 'museums.json', 'name' => 'name'],
        'parks' => ['file' => 'parks.json', 'name' => 'name'],
        'wifi_access_points' => ['file' => 'wifi_access_points.json', 'name' => 'name'],
    ];

    private int $inserted = 0;

    private int $updated = 0;

    private int $unchanged = 0;

    public function run(): void
    {
        if (! tenancy()->initialized) {
            throw new RuntimeException('CologneSeeder solo puede ejecutarse dentro de un tenant inicializado.');
        }

        DB::transaction(function (): void {
            $this->syncVillavicencioIdentity();
            // Los seeders heredados usan IDs explicitos. PostgreSQL no avanza
            // automaticamente sus secuencias, por lo que deben alinearse antes
            // de insertar los permisos nuevos de Colonia con IDs generados.
            $this->syncPostgresSequences(['users', 'roles', 'permissions']);
            $this->syncCatalog();
            $this->syncNavigation();
            $this->syncSettings();

            foreach (self::ESRI_SOURCES as $dataset => $source) {
                $this->syncEsriSource($dataset, $source['file'], $source['name']);
            }

            $this->syncParkingTicketMachines();
            $this->syncTrafficLights();
        });

        $this->syncPostgresSequences();

        foreach (self::CATALOG as $marker) {
            Cache::forget("cologne_{$marker['dataset']}_marker");
        }
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $this->command?->info(
            "Datos de Colonia sincronizados: {$this->inserted} nuevos, {$this->updated} actualizados, {$this->unchanged} sin cambios."
        );
    }

    private function syncVillavicencioIdentity(): void
    {
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            PermissionsSeeder::class,
            RoleHasPermissionsTableSeeder::class,
            ModelHasRolesTableSeeder::class,
            ModelHasPermissionsTableSeeder::class,
        ]);
    }

    private function syncPostgresSequences(array $tables = ['users', 'roles', 'permissions', 'marker_type', 'marker', 'slugs', 'menu']): void
    {
        if (DB::getDriverName() !== 'pgsql') {
            return;
        }

        foreach ($tables as $table) {
            DB::statement(
                "SELECT setval(pg_get_serial_sequence('{$table}', 'id'), GREATEST(COALESCE((SELECT MAX(id) FROM {$table}), 1), 1), true)"
            );
        }
    }

    private function syncCatalog(): void
    {
        $now = now();

        foreach ([
            1 => ['name' => 'Point', 'description' => 'Todos los marcadores de tipo punto'],
            3 => ['name' => 'Polygon', 'description' => 'Todos los marcadores de tipo poligono'],
        ] as $id => $type) {
            $this->syncRow('marker_type', ['id' => $id], $type);
        }

        foreach (self::CATALOG as $id => $marker) {
            $this->assertReservedId('slugs', 'id', $id, 'name', $marker['dataset']);
            $this->assertReservedId('marker', 'id', $id, 'name', $marker['name']);

            $this->syncRow('slugs', ['id' => $id], ['name' => $marker['dataset']]);

            $this->syncRow(
                'marker',
                ['id' => $id],
                [
                    'marker_type' => $marker['type'],
                    'name' => $marker['name'],
                    'icon' => $marker['icon'],
                    'color' => $marker['color'],
                    'slug' => $id,
                    'namespace' => $marker['namespace'],
                ]
            );

            $this->syncRow('bar_menu', ['marker' => $id], ['enabled' => true]);

            $permissionName = "commandbar-{$marker['name']}";
            if (! DB::table('permissions')
                ->where('name', $permissionName)
                ->where('guard_name', 'api')
                ->exists()) {
                DB::table('permissions')->insert([
                    'name' => $permissionName,
                    'guard_name' => 'api',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }

            $roleId = DB::table('roles')
                ->where('name', 'Administrador')
                ->where('guard_name', 'api')
                ->value('id');
            $permissionId = DB::table('permissions')
                ->where('name', $permissionName)
                ->where('guard_name', 'api')
                ->value('id');

            if ($roleId && $permissionId) {
                DB::table('role_has_permissions')->insertOrIgnore([
                    'permission_id' => $permissionId,
                    'role_id' => $roleId,
                ]);
            }
        }
    }

    /**
     * Inserta una fila ausente y solo actualiza columnas cuyo valor realmente cambio.
     */
    private function syncRow(string $table, array $key, array $values): void
    {
        $query = DB::table($table);
        foreach ($key as $column => $value) {
            $query->where($column, $value);
        }

        $existing = $query->first();
        if ($existing === null) {
            DB::table($table)->insert($key + $values + [
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return;
        }

        $dirty = [];
        foreach ($values as $column => $expected) {
            $actual = $existing->{$column} ?? null;
            $same = is_bool($expected)
                ? (bool) $actual === $expected
                : (string) $actual === (string) $expected;

            if (! $same) {
                $dirty[$column] = $expected;
            }
        }

        if ($dirty !== []) {
            $query->update($dirty + ['updated_at' => now()]);
        }
    }

    private function assertReservedId(string $table, string $idColumn, int $id, string $valueColumn, string $expected): void
    {
        $existing = DB::table($table)->where($idColumn, $id)->value($valueColumn);

        if ($existing !== null && $existing !== $expected) {
            throw new RuntimeException(
                "No se puede reservar {$table}.{$idColumn}={$id}: ya pertenece a '{$existing}'."
            );
        }
    }

    private function syncNavigation(): void
    {
        $items = [
            1 => ['name' => 'Mapa', 'path' => 'map', 'icon' => 'public', 'slug' => 'map', 'enabled' => true],
            5 => ['name' => 'Marcadores', 'path' => null, 'icon' => 'place', 'slug' => 'markers', 'enabled' => true],
            6 => ['name' => 'Usuarios', 'path' => 'users', 'icon' => 'person', 'slug' => 'users', 'enabled' => true],
        ];

        foreach ($items as $id => $item) {
            $this->assertReservedId('menu', 'id', $id, 'name', $item['name']);
            $this->syncRow('menu', ['id' => $id], $item);
        }
    }

    private function syncSettings(): void
    {
        $settings = [
            'position' => '50.9375,6.9603',
            'main_zoom' => '12',
            'heatmap_density' => '50',
            'map_request' => '',
        ];

        foreach ($settings as $key => $value) {
            if (! DB::table('settings')->where('key', $key)->exists()) {
                DB::table('settings')->insert([
                    'key' => $key,
                    'value' => $value,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    private function syncEsriSource(string $dataset, string $file, string $nameField): void
    {
        $path = $this->dataPath($file);

        if (filesize($path) === 0) {
            $this->command?->warn("{$file} esta vacio; el catalogo se conserva sin eliminar registros.");

            return;
        }

        $source = json_decode(file_get_contents($path), true, 512, JSON_THROW_ON_ERROR);
        $crs = 'EPSG:'.($source['spatialReference']['latestWkid'] ?? $source['spatialReference']['wkid'] ?? 'unknown');
        $geometryType = $source['geometryType'] ?? null;
        $records = [];
        $sourceKeyOccurrences = [];

        foreach ($source['features'] ?? [] as $feature) {
            $attributes = $feature['attributes'] ?? [];
            $geometry = $feature['geometry'] ?? [];
            $name = $attributes[$nameField] ?? null;
            $baseSourceKey = hash('sha256', $dataset.'|'.$this->json($attributes).'|'.$this->json($geometry));
            $occurrence = $sourceKeyOccurrences[$baseSourceKey] ?? 0;
            $sourceKeyOccurrences[$baseSourceKey] = $occurrence + 1;
            $sourceKey = $occurrence === 0
                ? $baseSourceKey
                : hash('sha256', "{$baseSourceKey}|duplicate:{$occurrence}");

            if ($geometryType === 'esriGeometryPoint') {
                if (! isset($geometry['x'], $geometry['y'])) {
                    $records[] = $this->record(
                        $dataset,
                        $sourceKey,
                        $name,
                        'None',
                        null,
                        null,
                        $geometry,
                        $attributes,
                        $crs
                    );

                    continue;
                }

                [$latitude, $longitude] = $this->utm32ToWgs84(
                    (float) $geometry['x'],
                    (float) $geometry['y']
                );

                $records[] = $this->record(
                    $dataset,
                    $sourceKey,
                    $name,
                    'Point',
                    $latitude,
                    $longitude,
                    ['type' => 'Point', 'coordinates' => [$latitude, $longitude]],
                    $attributes,
                    $crs
                );
            } elseif ($geometryType === 'esriGeometryPolygon') {
                $rings = array_map(function (array $ring): array {
                    return array_map(function (array $coordinate): array {
                        return $this->utm32ToWgs84((float) $coordinate[0], (float) $coordinate[1]);
                    }, $ring);
                }, $geometry['rings'] ?? []);

                $records[] = $this->record(
                    $dataset,
                    $sourceKey,
                    $name,
                    'Polygon',
                    null,
                    null,
                    ['type' => 'Polygon', 'coordinates' => $rings],
                    $attributes,
                    $crs
                );
            } else {
                throw new RuntimeException("Tipo de geometria no soportado en {$file}: {$geometryType}");
            }
        }

        $this->syncRecords($dataset, $records);
    }

    private function syncParkingTicketMachines(): void
    {
        $this->syncCsv(
            'parking_ticket_machines',
            'parking_ticket_machines.csv',
            ';',
            function (array $row): array {
                $sourceKey = trim((string) ($row['PSA-Nr'] ?? ''));

                if ($sourceKey === '') {
                    throw new RuntimeException('Un parquimetro no contiene PSA-Nr.');
                }

                if (trim((string) ($row['GeoKoordinateNord'] ?? '')) === ''
                    || trim((string) ($row['GeoKoordinateOst'] ?? '')) === '') {
                    return $this->record(
                        'parking_ticket_machines',
                        $sourceKey,
                        $row['Aufstellort'] ?? null,
                        'None',
                        null,
                        null,
                        [],
                        $row,
                        'EPSG:4326'
                    );
                }

                $latitude = $this->decimal($row['GeoKoordinateNord']);
                $longitude = $this->decimal($row['GeoKoordinateOst']);

                // La fuente contiene algunos valores numericos truncados o fuera de Colonia.
                // Conservamos esas filas, pero no exponemos una geometria incorrecta.
                if ($latitude < 49 || $latitude > 52 || $longitude < 5 || $longitude > 9) {
                    return $this->record(
                        'parking_ticket_machines',
                        $sourceKey,
                        $row['Aufstellort'] ?? null,
                        'None',
                        null,
                        null,
                        [],
                        $row,
                        'EPSG:4326'
                    );
                }

                return $this->record(
                    'parking_ticket_machines',
                    $sourceKey,
                    $row['Aufstellort'] ?? null,
                    'Point',
                    $latitude,
                    $longitude,
                    ['type' => 'Point', 'coordinates' => [$latitude, $longitude]],
                    $row,
                    'EPSG:4326'
                );
            }
        );
    }

    private function syncTrafficLights(): void
    {
        $this->syncCsv(
            'traffic_lights',
            'traffic_lights_2024.csv',
            ',',
            function (array $row): array {
                $rawX = $this->decimal($row['x'] ?? null);
                $rawY = $this->decimal($row['y'] ?? null);
                $easting = $rawX > 20000000 ? ($rawX - 20000000) / 10 : $rawX;
                $northing = $rawY > 10000000 ? $rawY / 10 : $rawY;
                [$latitude, $longitude] = $this->utm32ToWgs84($easting, $northing);
                $sourceKey = trim((string) ($row['lsanr'] ?? ''));

                if ($sourceKey === '') {
                    throw new RuntimeException('Un semaforo no contiene lsanr.');
                }

                return $this->record(
                    'traffic_lights',
                    $sourceKey,
                    $row['standort'] ?? $sourceKey,
                    'Point',
                    $latitude,
                    $longitude,
                    ['type' => 'Point', 'coordinates' => [$latitude, $longitude]],
                    $row,
                    'EPSG:25832'
                );
            }
        );
    }

    private function syncCsv(string $dataset, string $file, string $delimiter, callable $mapper): void
    {
        $path = $this->dataPath($file);

        if (filesize($path) === 0) {
            $this->command?->warn("{$file} esta vacio; el catalogo se conserva sin eliminar registros.");

            return;
        }

        $handle = fopen($path, 'rb');
        if ($handle === false) {
            throw new RuntimeException("No se pudo abrir {$file}.");
        }

        try {
            $headers = fgetcsv($handle, 0, $delimiter, '"', '\\');
            if ($headers === false) {
                throw new RuntimeException("No se pudo leer el encabezado de {$file}.");
            }
            $headers[0] = preg_replace('/^\xEF\xBB\xBF/', '', $headers[0]);
            $records = [];

            while (($values = fgetcsv($handle, 0, $delimiter, '"', '\\')) !== false) {
                if ($values === [null] || count($values) !== count($headers)) {
                    continue;
                }

                $records[] = $mapper(array_combine($headers, $values));
            }
        } finally {
            fclose($handle);
        }

        $this->syncRecords($dataset, $records);
    }

    private function record(
        string $dataset,
        string $sourceKey,
        ?string $name,
        string $geometryType,
        ?float $latitude,
        ?float $longitude,
        array $geometry,
        array $properties,
        string $sourceCrs
    ): array {
        $payload = [
            'name' => $name,
            'geometry_type' => $geometryType,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'geometry' => $geometry,
            'properties' => $properties,
            'source_crs' => $sourceCrs,
        ];

        return [
            'uuid' => $this->uuidV5("{$dataset}:{$sourceKey}"),
            'dataset' => $dataset,
            'source_key' => $sourceKey,
            'source_hash' => hash('sha256', $this->json($payload)),
            'name' => $name,
            'geometry_type' => $geometryType,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'geometry' => $this->json($geometry),
            'properties' => $this->json($properties),
            'source_crs' => $sourceCrs,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    private function syncRecords(string $dataset, array $records): void
    {
        foreach (array_chunk($records, 500) as $chunk) {
            $existing = DB::table('cologne_geodata')
                ->where('dataset', $dataset)
                ->whereIn('source_key', array_column($chunk, 'source_key'))
                ->pluck('source_hash', 'source_key');
            $changed = [];

            foreach ($chunk as $record) {
                $currentHash = $existing->get($record['source_key']);
                if ($currentHash === $record['source_hash']) {
                    $this->unchanged++;
                    continue;
                }

                $currentHash === null ? $this->inserted++ : $this->updated++;
                $changed[] = $record;
            }

            if ($changed === []) {
                continue;
            }

            DB::table('cologne_geodata')->upsert(
                $changed,
                ['dataset', 'source_key'],
                [
                    'uuid',
                    'source_hash',
                    'name',
                    'geometry_type',
                    'latitude',
                    'longitude',
                    'geometry',
                    'properties',
                    'source_crs',
                    'updated_at',
                ]
            );
        }
    }

    private function dataPath(string $file): string
    {
        $path = database_path("data/cologne/{$file}");

        if (! is_file($path)) {
            throw new RuntimeException("No existe la fuente de datos {$path}.");
        }

        return $path;
    }

    private function decimal(?string $value): float
    {
        if ($value === null || trim($value) === '') {
            throw new RuntimeException('Se encontro una coordenada vacia.');
        }

        $normalized = str_replace(',', '.', trim($value));
        if (! is_numeric($normalized)) {
            throw new RuntimeException("Coordenada invalida: {$value}");
        }

        return (float) $normalized;
    }

    private function json(array $value): string
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR);
    }

    private function uuidV5(string $value): string
    {
        $hex = sha1('medusa:cologne:'.$value);
        $hex[12] = '5';
        $hex[16] = dechex((hexdec($hex[16]) & 0x3) | 0x8);

        return sprintf(
            '%s-%s-%s-%s-%s',
            substr($hex, 0, 8),
            substr($hex, 8, 4),
            substr($hex, 12, 4),
            substr($hex, 16, 4),
            substr($hex, 20, 12)
        );
    }

    /**
     * Convierte ETRS89 / UTM zona 32N (EPSG:25832) a WGS84.
     *
     * @return array{0: float, 1: float} [latitud, longitud]
     */
    private function utm32ToWgs84(float $easting, float $northing): array
    {
        $a = 6378137.0;
        $eccSquared = 0.00669438002290;
        $k0 = 0.9996;
        $eccPrimeSquared = $eccSquared / (1 - $eccSquared);
        $x = $easting - 500000.0;
        $m = $northing / $k0;
        $mu = $m / ($a * (1 - $eccSquared / 4 - 3 * $eccSquared ** 2 / 64 - 5 * $eccSquared ** 3 / 256));
        $e1 = (1 - sqrt(1 - $eccSquared)) / (1 + sqrt(1 - $eccSquared));
        $phi1 = $mu
            + (3 * $e1 / 2 - 27 * $e1 ** 3 / 32) * sin(2 * $mu)
            + (21 * $e1 ** 2 / 16 - 55 * $e1 ** 4 / 32) * sin(4 * $mu)
            + (151 * $e1 ** 3 / 96) * sin(6 * $mu)
            + (1097 * $e1 ** 4 / 512) * sin(8 * $mu);
        $sinPhi1 = sin($phi1);
        $cosPhi1 = cos($phi1);
        $tanPhi1 = tan($phi1);
        $n1 = $a / sqrt(1 - $eccSquared * $sinPhi1 ** 2);
        $t1 = $tanPhi1 ** 2;
        $c1 = $eccPrimeSquared * $cosPhi1 ** 2;
        $r1 = $a * (1 - $eccSquared) / (1 - $eccSquared * $sinPhi1 ** 2) ** 1.5;
        $d = $x / ($n1 * $k0);
        $latitude = $phi1 - ($n1 * $tanPhi1 / $r1) * (
            $d ** 2 / 2
            - (5 + 3 * $t1 + 10 * $c1 - 4 * $c1 ** 2 - 9 * $eccPrimeSquared) * $d ** 4 / 24
            + (61 + 90 * $t1 + 298 * $c1 + 45 * $t1 ** 2 - 252 * $eccPrimeSquared - 3 * $c1 ** 2) * $d ** 6 / 720
        );
        $longitude = deg2rad(9) + (
            $d
            - (1 + 2 * $t1 + $c1) * $d ** 3 / 6
            + (5 - 2 * $c1 + 28 * $t1 - 3 * $c1 ** 2 + 8 * $eccPrimeSquared + 24 * $t1 ** 2) * $d ** 5 / 120
        ) / $cosPhi1;
        $latitude = rad2deg($latitude);
        $longitude = rad2deg($longitude);

        if ($latitude < 49 || $latitude > 52 || $longitude < 5 || $longitude > 9) {
            throw new RuntimeException("Coordenada fuera del area esperada de Colonia: {$latitude}, {$longitude}");
        }

        return [round($latitude, 7), round($longitude, 7)];
    }
}
