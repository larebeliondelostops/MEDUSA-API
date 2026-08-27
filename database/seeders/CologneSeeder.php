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
use Illuminate\Support\Facades\Schema;
use RuntimeException;
use Spatie\Permission\PermissionRegistrar;

class CologneSeeder extends Seeder
{
    private const POINT_STRATEGY = StrategyCologneGeodata::class;

    private const ADMIN_EMAILS = [
        'jhernandez@igniciongames.com',
        'ignicion@gmail.com',
    ];

    private const CATALOG = [
        200 => ['dataset' => 'refugee_accommodation', 'name' => 'Refugee accommodation', 'icon' => 'home', 'color' => 'orange', 'type' => 1, 'namespace' => self::POINT_STRATEGY],
        201 => ['dataset' => 'bus_parking', 'name' => 'Bus parking', 'icon' => 'directions_bus', 'color' => 'blue', 'type' => 1, 'namespace' => self::POINT_STRATEGY],
        202 => ['dataset' => 'libraries', 'name' => 'Libraries', 'icon' => 'local_library', 'color' => 'pink', 'type' => 1, 'namespace' => self::POINT_STRATEGY],
        203 => ['dataset' => 'intercultural_centers', 'name' => 'Intercultural centers', 'icon' => 'groups', 'color' => 'lightgreen', 'type' => 1, 'namespace' => self::POINT_STRATEGY],
        204 => ['dataset' => 'cemetery_entrances', 'name' => 'Cemetery entrances', 'icon' => 'door_front', 'color' => 'purple', 'type' => 1, 'namespace' => self::POINT_STRATEGY],
        205 => ['dataset' => 'schools', 'name' => 'Schools', 'icon' => 'school', 'color' => 'yellow', 'type' => 1, 'namespace' => self::POINT_STRATEGY],
        206 => ['dataset' => 'hospitals', 'name' => 'Hospitals', 'icon' => 'local_hospital', 'color' => 'red', 'type' => 1, 'namespace' => self::POINT_STRATEGY],
        207 => ['dataset' => 'natural_monuments', 'name' => 'Natural monuments', 'icon' => 'nature', 'color' => 'green', 'type' => 1, 'namespace' => self::POINT_STRATEGY],
        208 => ['dataset' => 'museums', 'name' => 'Museums', 'icon' => 'museum', 'color' => 'cyan', 'type' => 1, 'namespace' => self::POINT_STRATEGY],
        209 => ['dataset' => 'parking_ticket_machines', 'name' => 'Parking meters', 'icon' => 'local_parking', 'color' => 'bluegreen', 'type' => 1, 'namespace' => self::POINT_STRATEGY],
        210 => ['dataset' => 'parks', 'name' => 'Parks', 'icon' => 'park', 'color' => 'orange', 'type' => 3, 'namespace' => StrategyCologneParks::class],
        211 => ['dataset' => 'wifi_access_points', 'name' => 'WiFi access points', 'icon' => 'wifi', 'color' => 'lightgreen', 'type' => 1, 'namespace' => self::POINT_STRATEGY],
        212 => ['dataset' => 'traffic_lights', 'name' => 'Traffic lights', 'icon' => 'traffic', 'color' => 'blue', 'type' => 1, 'namespace' => self::POINT_STRATEGY],
    ];

    private const ESRI_SOURCES = [
        'refugee_accommodation' => ['file' => 'refugee_accommodation.json', 'name' => 'strassenname'],
        'bus_parking' => ['file' => 'bus_parking.json', 'name' => 'bezeichnun'],
        'libraries' => ['file' => 'libraries.json', 'name' => 'name'],
        'intercultural_centers' => ['file' => 'intercultural_centers.json', 'name' => 'z_name'],
        'cemetery_entrances' => ['file' => 'cemetery_entrances.json', 'name' => 'friedhofsname'],
        'schools' => ['file' => 'schools.json', 'name' => 'name'],
        'hospitals' => ['file' => 'hospitals.json', 'name' => 'name'],
        'natural_monuments' => ['file' => 'natural_monuments.json', 'name' => 'beschr'],
        'museums' => ['file' => 'museums.json', 'name' => 'name'],
        'parks' => ['file' => 'parks.json', 'name' => 'name'],
        'wifi_access_points' => ['file' => 'wifi_access_points.json', 'name' => 'ap_name'],
    ];

    private const INCIDENT_CATEGORIES = [
        1 => ['name' => 'Vivienda o edificaciÃ³n', 'description' => 'DaÃ±os en casas, apartamentos, edificios o estructuras.'],
        2 => ['name' => 'VÃ­a o acceso', 'description' => 'Problemas que impiden el trÃ¡nsito o acceso seguro.'],
        3 => ['name' => 'Agua y saneamiento', 'description' => 'Afectaciones en el servicio de agua o en el sistema de saneamiento.'],
        4 => ['name' => 'EnergÃ­a, gas y comunicaciones', 'description' => 'InterrupciÃ³n o daÃ±os en servicios pÃºblicos.'],
        5 => ['name' => 'Infraestructura pÃºblica', 'description' => 'DaÃ±os en lugares o instalaciones de uso comunitario o estatal.'],
        6 => ['name' => 'Riesgo visible en el entorno', 'description' => 'Amenazas o situaciones de riesgo que pueden afectar a la comunidad.'],
        7 => ['name' => 'Necesidad bÃ¡sica de una familia o comunidad', 'description' => 'Necesidades esenciales de familias o comunidades afectadas.'],
        8 => ['name' => 'Necesidad especial de una persona o poblaciÃ³n', 'description' => 'Personas que requieren atenciÃ³n prioritaria.'],
        9 => ['name' => 'Negocio, cultivo o actividad productiva', 'description' => 'Afectaciones que impactan medios de vida y producciÃ³n.'],
        10 => ['name' => 'Otra afectaciÃ³n', 'description' => 'SituaciÃ³n no contemplada en las opciones anteriores.'],
    ];

    private const INCIDENT_SUBINDICATORS = [
        1 => ['Grietas visibles', 'DaÃ±os en paredes, techos o pisos', 'DaÃ±o estructural (columnas, vigas, muros)', 'Desprendimientos (tejas, vidrios, revoque, etc.)', 'Colapso parcial', 'Colapso total', 'Vivienda aparentemente inhabitable', 'Acceso bloqueado', 'DaÃ±os en zonas comunes (edificio/conjunto)', 'Solicitud de revisiÃ³n de edificaciÃ³n'],
        2 => ['Calle bloqueada', 'Carretera daÃ±ada', 'Derrumbe o caÃ­da de rocas sobre la vÃ­a', 'Puente o alcantarilla afectada', 'Hundimiento o grietas en la vÃ­a', 'Ãrboles, postes u objetos bloqueando el paso', 'Acceso peatonal afectado', 'Comunidad o vereda aislada', 'Acceso a hospital, colegio u otro servicio bloqueado', 'Otra afectaciÃ³n en vÃ­a o acceso'],
        3 => ['Falta de agua', 'TuberÃ­a rota o fuga de agua', 'Agua aparentemente contaminada (color, olor, sabor)', 'DaÃ±o en tanque o sistema de almacenamiento', 'Alcantarillado rebosado', 'Aguas negras expuestas', 'BaÃ±os o sanitarios fuera de servicio', 'AcumulaciÃ³n de aguas residuales', 'DaÃ±o en planta o sistema de tratamiento', 'Otra afectaciÃ³n en agua o saneamiento'],
        4 => ['Falta de energÃ­a elÃ©ctrica', 'Poste, transformador o red elÃ©ctrica daÃ±ada', 'Instalaciones elÃ©ctricas del inmueble daÃ±adas (sin riesgo inmediato)', 'InterrupciÃ³n del servicio de gas', 'Red o medidor de gas daÃ±ado (sin fuga activa)', 'PÃ©rdida de telefonÃ­a mÃ³vil', 'PÃ©rdida de internet o datos', 'Antena o infraestructura de comunicaciones afectada', 'Alumbrado pÃºblico fuera de servicio', 'Otra afectaciÃ³n en servicios'],
        5 => ['Hospital o centro de salud afectado', 'Colegio, escuela o jardÃ­n infantil afectado', 'EstaciÃ³n de bomberos, policÃ­a u otra entidad de respuesta afectada', 'AlcaldÃ­a, gobernaciÃ³n u oficina pÃºblica daÃ±ada', 'Albergue, coliseo o salÃ³n comunal afectado', 'Plaza de mercado o centro de abastecimiento', 'Planta de agua, tanque o sistema de bombeo afectado', 'Puente peatonal u otra estructura pÃºblica', 'Otra infraestructura pÃºblica afectada', 'Desconozco el estado de la infraestructura'],
        6 => ['Grietas en el terreno', 'Ladera o talud inestable', 'CaÃ­da o posible caÃ­da de rocas', 'Muro de contenciÃ³n afectado', 'Ãrbol con riesgo de caÃ­da', 'Escombros o estructuras inestables', 'Quebrada, rÃ­o o canal represado', 'DaÃ±o en cauces o estructuras hidrÃ¡ulicas', 'Elementos con riesgo de desprendimiento', 'Otra situaciÃ³n de riesgo en el entorno'],
        7 => ['Familia sin lugar seguro para dormir', 'Falta de agua potable', 'Falta de alimentos', 'Falta de elementos bÃ¡sicos (colchones, cobijas, ropa, kits de higiene, etc.)', 'Albergue con necesidades bÃ¡sicas', 'Comunidad aislada sin suministros', 'PÃ©rdida de medios para cocinar', 'Hacinamiento o alojamiento temporal insuficiente', 'Varias familias afectadas en el mismo sector', 'Otra necesidad bÃ¡sica'],
        8 => ['Adulto mayor sin apoyo', 'Persona con discapacidad', 'Persona con movilidad reducida', 'Mujer gestante o en perÃ­odo de lactancia', 'Persona que requiere medicamentos o tratamiento', 'Persona dependiente de equipo mÃ©dico sin servicio elÃ©ctrico', 'NiÃ±os pequeÃ±os en condiciÃ³n de vulnerabilidad', 'Persona sin red familiar o cuidador', 'Necesidad de transporte especial', 'Otra necesidad especial'],
        9 => ['Negocio o local comercial afectado', 'Bodega o inventario daÃ±ado', 'Maquinaria, herramientas o equipos daÃ±ados', 'Cultivos o plantaciones afectadas', 'Animales de granja o aves afectados', 'Sistema de riego o abastecimiento productivo daÃ±ado', 'PÃ©rdida de acceso a zonas de producciÃ³n', 'DaÃ±o en pesca o actividad acuÃ­cola', 'PÃ©rdida de empleo o ingresos por el desastre', 'Otra afectaciÃ³n en actividades productivas'],
        10 => ['DaÃ±o no clasificado', 'Necesidad no clasificada', 'SituaciÃ³n que quiero describir con mis palabras'],
    ];


    private const INCIDENT_CATEGORIES_EN = [
        1 => ['name' => 'Housing or building', 'description' => 'Damage to houses, apartments, buildings or structures.'],
        2 => ['name' => 'Road or access', 'description' => 'Issues that prevent safe transit or access.'],
        3 => ['name' => 'Water and sanitation', 'description' => 'Impacts on water service or the sanitation system.'],
        4 => ['name' => 'Energy, gas and communications', 'description' => 'Disruption or damage to utility services.'],
        5 => ['name' => 'Public infrastructure', 'description' => 'Damage to community or public-use places and facilities.'],
        6 => ['name' => 'Visible environmental risk', 'description' => 'Threats or risk situations that may affect the community.'],
        7 => ['name' => 'Basic family or community need', 'description' => 'Essential needs of affected families or communities.'],
        8 => ['name' => 'Special need of a person or population', 'description' => 'People who require priority attention.'],
        9 => ['name' => 'Business, crops or productive activity', 'description' => 'Impacts affecting livelihoods and production.'],
        10 => ['name' => 'Other impact', 'description' => 'Situation not covered by the previous options.'],
    ];

    private const INCIDENT_SUBINDICATORS_EN = [
        1 => ['Visible cracks', 'Damage to walls, roofs or floors', 'Structural damage (columns, beams, walls)', 'Detached elements (roof tiles, glass, plaster, etc.)', 'Partial collapse', 'Total collapse', 'Apparently uninhabitable housing', 'Blocked access', 'Damage in common areas (building/complex)', 'Building inspection request'],
        2 => ['Blocked street', 'Damaged road', 'Landslide or falling rocks on the road', 'Bridge or culvert affected', 'Sinkhole or cracks in the road', 'Trees, poles or objects blocking the way', 'Pedestrian access affected', 'Isolated community or rural area', 'Access to a hospital, school or other service blocked', 'Other impact on road or access'],
        3 => ['No water supply', 'Broken pipe or water leak', 'Apparently contaminated water (color, smell, taste)', 'Damage to tank or storage system', 'Overflowing sewage system', 'Exposed wastewater', 'Bathrooms or toilets out of service', 'Wastewater accumulation', 'Damage to plant or treatment system', 'Other impact on water or sanitation'],
        4 => ['Power outage', 'Damaged pole, transformer or power line', 'Damaged electrical installations in the property (no immediate risk)', 'Gas service interruption', 'Damaged gas line or meter (no active leak)', 'Mobile service loss', 'Internet or data service loss', 'Antenna or communications infrastructure affected', 'Public lighting out of service', 'Other impact on utilities'],
        5 => ['Hospital or health center affected', 'School or kindergarten affected', 'Fire station, police or other response entity affected', 'City hall, governor office or public office damaged', 'Shelter, coliseum or community hall affected', 'Market square or supply center affected', 'Water plant, tank or pumping system affected', 'Pedestrian bridge or other public structure affected', 'Other public infrastructure affected', 'Infrastructure status unknown'],
        6 => ['Ground cracks', 'Unstable slope or embankment', 'Falling or potentially falling rocks', 'Retaining wall affected', 'Tree at risk of falling', 'Debris or unstable structures', 'Stream, river or canal blocked', 'Damage to channels or hydraulic structures', 'Elements at risk of detachment', 'Other environmental risk situation'],
        7 => ['Family without a safe place to sleep', 'Lack of drinking water', 'Lack of food', 'Lack of basic items (mattresses, blankets, clothes, hygiene kits, etc.)', 'Shelter with unmet basic needs', 'Isolated community without supplies', 'Loss of cooking means', 'Overcrowding or insufficient temporary shelter', 'Several families affected in the same area', 'Other basic need'],
        8 => ['Older adult without support', 'Person with disability', 'Person with reduced mobility', 'Pregnant or breastfeeding woman', 'Person requiring medication or treatment', 'Person dependent on medical equipment without power service', 'Young children in vulnerable conditions', 'Person without family support or caregiver', 'Need for special transportation', 'Other special need'],
        9 => ['Affected business or commercial premises', 'Damaged warehouse or inventory', 'Damaged machinery, tools or equipment', 'Affected crops or plantations', 'Affected farm animals or birds', 'Damaged irrigation or productive supply system', 'Loss of access to production areas', 'Damage to fishing or aquaculture activity', 'Loss of jobs or income due to the disaster', 'Other impact on productive activities'],
        10 => ['Unclassified damage', 'Unclassified need', 'Situation I want to describe in my own words'],
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
            $this->syncEnglishUiData();
            $this->syncIncidentIndicators();
            // Los seeders heredados usan IDs explicitos. PostgreSQL no avanza
            // automaticamente sus secuencias, por lo que deben alinearse antes
            // de insertar los permisos nuevos de Colonia con IDs generados.
            $this->syncPostgresSequences(['users', 'roles', 'permissions']);
            $this->ensureCologneAdministrator();
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

    private function syncPostgresSequences(array $tables = ['users', 'roles', 'permissions', 'marker_type', 'marker', 'slugs', 'menu', 'indicators']): void
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
        foreach ([
            1 => ['name' => 'Point', 'description' => 'All point markers'],
            3 => ['name' => 'Polygon', 'description' => 'All polygon markers'],
        ] as $id => $type) {
            $this->syncRow('marker_type', ['id' => $id], $type);
        }

        foreach (self::CATALOG as $id => $marker) {
            $this->assertReservedId('slugs', 'id', $id, 'name', $marker['dataset']);

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

            $this->grantPermissionToRole("commandbar-{$marker['name']}", 'Administrator');
        }
    }

    private function syncEnglishUiData(): void
    {
        $this->syncRow('roles', ['id' => 1], ['name' => 'Administrator', 'guard_name' => 'api']);
        $this->syncRow('roles', ['id' => 2], ['name' => 'Editor', 'guard_name' => 'api']);
        $this->syncRow('roles', ['id' => 3], ['name' => 'Mobility Secretary', 'guard_name' => 'api']);

        if (Schema::hasTable('reports_data') && Schema::hasTable('slugs')) {
            $incidentSlugId = $this->ensureSlugId('incident', 6);

            $this->syncRow('reports_data', ['slug' => $incidentSlugId], [
                'name' => 'Incidents',
                'description' => 'Cologne incidents',
                'namespace' => 'App\\Strategies\\StrategiesReports\\Villavicencio\\StrategyIncidentsReports',
            ]);
        }
    }

    private function ensureSlugId(string $name, ?int $preferredId = null): int
    {
        $existingId = DB::table('slugs')->where('name', $name)->value('id');
        if ($existingId !== null) {
            return (int) $existingId;
        }

        if ($preferredId !== null && ! DB::table('slugs')->where('id', $preferredId)->exists()) {
            $this->syncRow('slugs', ['id' => $preferredId], ['name' => $name]);

            return $preferredId;
        }

        $nextId = ((int) DB::table('slugs')->max('id')) + 1;
        $this->syncRow('slugs', ['id' => $nextId], ['name' => $name]);

        return $nextId;
    }

    private function syncIncidentIndicators(): void
    {
        if (! Schema::hasTable('indicators')) {
            return;
        }

        foreach (self::INCIDENT_CATEGORIES_EN as $id => $category) {
            $this->syncRow('indicators', ['id' => $id], [
                'name' => $category['name'],
                'description' => $category['description'],
                'parent_indicator_id' => null,
            ]);
        }

        $this->syncPostgresSequences(['indicators']);

        foreach (self::INCIDENT_SUBINDICATORS_EN as $parentId => $subindicators) {
            foreach ($subindicators as $index => $englishName) {
                $legacyName = self::INCIDENT_SUBINDICATORS[$parentId][$index] ?? null;
                $this->syncIncidentSubindicator($parentId, $englishName, $legacyName);
            }
        }
    }

    private function syncIncidentSubindicator(int $parentId, string $englishName, ?string $legacyName = null): void
    {
        $candidateNames = array_values(array_unique(array_filter([$legacyName, $englishName])));
        $existingId = DB::table('indicators')
            ->where('parent_indicator_id', $parentId)
            ->whereIn('name', $candidateNames)
            ->value('id');

        if ($existingId !== null) {
            $this->syncRow('indicators', ['id' => (int) $existingId], [
                'name' => $englishName,
                'description' => null,
                'parent_indicator_id' => $parentId,
            ]);

            return;
        }

        $this->syncRow('indicators', [
            'parent_indicator_id' => $parentId,
            'name' => $englishName,
        ], [
            'description' => null,
        ]);
    }

    private function ensureCologneAdministrator(): void
    {
        $userId = DB::table('users')->whereIn('email', self::ADMIN_EMAILS)->value('id');
        $roleId = DB::table('roles')
            ->where('guard_name', 'api')
            ->where(function ($query): void {
                $query->where('name', 'Administrator')
                    ->orWhere('name', 'Administrador')
                    ->orWhere('id', 1);
            })
            ->value('id');

        if (! $userId || ! $roleId) {
            throw new RuntimeException('No fue posible localizar a Jorge Ignicion o el rol Administrator.');
        }

        DB::table('model_has_roles')->insertOrIgnore([
            'role_id' => $roleId,
            'model_type' => 'App\\Models\\User',
            'model_id' => $userId,
        ]);
    }

    private function grantPermissionToRole(string $permissionName, string $roleName): void
    {
        $permissionId = DB::table('permissions')
            ->where('name', $permissionName)
            ->where('guard_name', 'api')
            ->value('id');

        if (! $permissionId) {
            $permissionId = DB::table('permissions')->insertGetId([
                'name' => $permissionName,
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $roleId = DB::table('roles')
            ->where('name', $roleName)
            ->where('guard_name', 'api')
            ->value('id');

        if (! $roleId) {
            throw new RuntimeException("No existe el rol {$roleName} para asignar {$permissionName}.");
        }

        DB::table('role_has_permissions')->insertOrIgnore([
            'permission_id' => $permissionId,
            'role_id' => $roleId,
        ]);
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

        $hasCreatedAt = Schema::hasColumn($table, 'created_at');
        $hasUpdatedAt = Schema::hasColumn($table, 'updated_at');
        $existing = $query->first();
        if ($existing === null) {
            $payload = $key + $values;

            if ($hasCreatedAt) {
                $payload['created_at'] = now();
            }

            if ($hasUpdatedAt) {
                $payload['updated_at'] = now();
            }

            DB::table($table)->insert($payload);

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
            if ($hasUpdatedAt) {
                $dirty['updated_at'] = now();
            }

            $query->update($dirty);
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
            1 => ['name' => 'Map', 'path' => 'map', 'icon' => 'public', 'slug' => 'map', 'enabled' => true],
            4 => ['name' => 'Incidents', 'path' => 'markers/incident', 'icon' => 'assured_workload', 'slug' => 'incident', 'enabled' => true],
            5 => ['name' => 'Markers', 'path' => null, 'icon' => 'place', 'slug' => 'markers', 'enabled' => true],
            6 => ['name' => 'Users', 'path' => 'users', 'icon' => 'person', 'slug' => 'users', 'enabled' => true],
        ];

        foreach ($items as $id => $item) {
            $this->syncRow('menu', ['id' => $id], $item);
            $this->grantPermissionToRole("menu-{$item['name']}", 'Administrator');
        }

        $submenus = [
            '5-traffic_lights' => [
                'menu' => 5,
                'level' => 2,
                'name' => 'Traffic lights',
                'path' => 'markers/traffic_lights',
                'icon' => 'traffic',
                'slug' => 'traffic_lights',
                'enabled' => true,
            ],
            '5-parking_ticket_machines' => [
                'menu' => 5,
                'level' => 2,
                'name' => 'Parking meters',
                'path' => 'markers/parking_ticket_machines',
                'icon' => 'local_parking',
                'slug' => 'parking_ticket_machines',
                'enabled' => true,
            ],
        ];

        foreach ($submenus as $identifier => $submenu) {
            $this->syncRow('sub_menu', ['identifier' => $identifier], $submenu);
            $this->grantPermissionToRole("submenu-{$submenu['name']}", 'Administrator');
        }
    }

    private function syncSettings(): void
    {
        $settings = [
            'position' => '50.9375,6.9603',
            'main_zoom' => '12',
            'heatmap_density' => '50',
            'map_request' => 'incidents',
        ];

        foreach ($settings as $key => $value) {
            if ($key === 'map_request') {
                $this->syncRow('settings', ['key' => $key], ['value' => $value]);

                continue;
            }

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
        $fieldAliases = $source['fieldAliases'] ?? [];
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
                        $this->translateProperties($dataset, $attributes, $fieldAliases),
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
                    $this->translateProperties($dataset, $attributes, $fieldAliases),
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
                    $this->translateProperties($dataset, $attributes, $fieldAliases),
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
                        $this->translateProperties('parking_ticket_machines', $row),
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
                        $this->translateProperties('parking_ticket_machines', $row),
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
                    $this->translateProperties('parking_ticket_machines', $row),
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
                    $this->translateProperties('traffic_lights', $row),
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

    private function translateProperties(string $dataset, array $properties, array $fieldAliases = []): array
    {
        $translated = [];

        foreach ($properties as $key => $value) {
            $translated[$this->propertyLabel($dataset, (string) $key, $fieldAliases)] = $this->propertyValue($value);
        }

        return $translated;
    }

    private function propertyLabel(string $dataset, string $key, array $fieldAliases = []): string
    {
        $labels = [
            'refugee_accommodation' => ['strassenname' => 'Street'],
            'bus_parking' => ['bezeichnun' => 'Name'],
            'libraries' => ['name' => 'Name'],
            'intercultural_centers' => ['z_name' => 'Name'],
            'cemetery_entrances' => ['friedhofsname' => 'Cemetery'],
            'schools' => ['name' => 'Name'],
            'hospitals' => ['name' => 'Name'],
            'natural_monuments' => ['beschr' => 'Description'],
            'museums' => ['name' => 'Name'],
            'parks' => ['name' => 'Name'],
            'wifi_access_points' => ['ap_name' => 'Access point'],
            'parking_ticket_machines' => [
                'PSA-Nr' => 'Parking meter no.',
                'Aufstellort' => 'Location',
                'PLZ' => 'Postal code',
                'Bezirk/Gebiet' => 'District/Area',
                'Abschnitt von' => 'Section from',
                'Abschnitt bis' => 'Section to',
                'Stellplätze' => 'Parking spaces',
                'Roter Punkt' => 'Red dot',
                'Gebührenzeit' => 'Fee hours',
                'Gebühr je 20 Minuten' => 'Fee per 20 minutes',
                'Höchstparkdauer' => 'Maximum parking duration',
                'Tagesgebühr 4,00 €' => 'Daily fee (EUR 4.00)',
                'GeoKoordinateNord' => 'Latitude',
                'GeoKoordinateOst' => 'Longitude',
            ],
            'traffic_lights' => [
                'lsanr' => 'Traffic light no.',
                'x' => 'Raw X',
                'y' => 'Raw Y',
                'standort' => 'Location',
                'baulast' => 'Road authority',
                'bezirk' => 'District',
                'blindens' => 'Accessible signal for visually impaired',
                'bemerkung' => 'Notes',
                'locid' => 'Local ID',
                'mapem' => 'MapEM',
            ],
        ];

        if (isset($labels[$dataset][$key])) {
            return $labels[$dataset][$key];
        }

        $alias = $fieldAliases[$key] ?? null;

        return is_string($alias) && $alias !== '' ? $alias : $key;
    }

    private function propertyValue(mixed $value): mixed
    {
        if (! is_string($value)) {
            return $value;
        }

        return match (mb_strtolower(trim($value))) {
            'ja' => 'Yes',
            'nein' => 'No',
            '---' => null,
            default => $value,
        };
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

