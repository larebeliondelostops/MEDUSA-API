<?php

namespace App\Support;

final class TenantLanguage
{
    private const ENGLISH_TENANTS = ['cologne'];

    private const ROLE_MAP = [
        'Administrador' => 'Administrator',
        'Editor' => 'Editor',
        'Secretario De Movilidad' => 'Mobility Secretary',
    ];

    private const FIELD_NAME_MAP = [
        'name' => 'Name',
        'email' => 'Email',
        'role' => 'Role',
        'role_id' => 'Role',
        'address' => 'Address',
        'phone' => 'Phone',
        'phone_number' => 'Phone',
        'password' => 'Password',
        'position' => 'Position',
        'main_zoom' => 'Main zoom',
        'heatmap_density' => 'Heatmap density',
        'map_request' => 'External mappings',
        'IndicatorId' => 'Subcategory',
        'description' => 'Description',
        'pointCoordinates' => 'Coordinates',
        'image' => 'Image',
    ];

    private const FIELD_PLACEHOLDER_MAP = [
        'name' => 'Enter the name',
        'email' => 'Enter the email',
        'role' => 'Enter the role',
        'role_id' => 'Select a role',
        'address' => 'Enter the address',
        'phone' => 'Enter the phone number',
        'phone_number' => 'Enter the phone number',
        'password' => 'Enter the password',
        'position' => 'Enter the coordinate pair',
        'main_zoom' => 'Enter the zoom level',
        'heatmap_density' => 'Enter the density',
        'map_request' => 'Enter the names separated by commas',
    ];

    private const INDICATOR_NAME_MAP = [
        'Vivienda o edificación' => 'Housing or building',
        'Vía o acceso' => 'Road or access',
        'Agua y saneamiento' => 'Water and sanitation',
        'Energía, gas y comunicaciones' => 'Energy, gas and communications',
        'Infraestructura pública' => 'Public infrastructure',
        'Riesgo visible en el entorno' => 'Visible environmental risk',
        'Necesidad básica de una familia o comunidad' => 'Basic family or community need',
        'Necesidad especial de una persona o población' => 'Special need of a person or population',
        'Negocio, cultivo o actividad productiva' => 'Business, crops or productive activity',
        'Otra afectación' => 'Other impact',
        'Grietas visibles' => 'Visible cracks',
        'Daños en paredes, techos o pisos' => 'Damage to walls, roofs or floors',
        'Daño estructural (columnas, vigas, muros)' => 'Structural damage (columns, beams, walls)',
        'Desprendimientos (tejas, vidrios, revoque, etc.)' => 'Detached elements (roof tiles, glass, plaster, etc.)',
        'Colapso parcial' => 'Partial collapse',
        'Colapso total' => 'Total collapse',
        'Vivienda aparentemente inhabitable' => 'Apparently uninhabitable housing',
        'Acceso bloqueado' => 'Blocked access',
        'Daños en zonas comunes (edificio/conjunto)' => 'Damage in common areas (building/complex)',
        'Solicitud de revisión de edificación' => 'Building inspection request',
        'Calle bloqueada' => 'Blocked street',
        'Carretera dañada' => 'Damaged road',
        'Derrumbe o caída de rocas sobre la vía' => 'Landslide or falling rocks on the road',
        'Puente o alcantarilla afectada' => 'Bridge or culvert affected',
        'Hundimiento o grietas en la vía' => 'Sinkhole or cracks in the road',
        'Árboles, postes u objetos bloqueando el paso' => 'Trees, poles or objects blocking the way',
        'Acceso peatonal afectado' => 'Pedestrian access affected',
        'Comunidad o vereda aislada' => 'Isolated community or rural area',
        'Acceso a hospital, colegio u otro servicio bloqueado' => 'Access to a hospital, school or other service blocked',
        'Otra afectación en vía o acceso' => 'Other impact on road or access',
        'Falta de agua' => 'No water supply',
        'Tubería rota o fuga de agua' => 'Broken pipe or water leak',
        'Agua aparentemente contaminada (color, olor, sabor)' => 'Apparently contaminated water (color, smell, taste)',
        'Daño en tanque o sistema de almacenamiento' => 'Damage to tank or storage system',
        'Alcantarillado rebosado' => 'Overflowing sewage system',
        'Aguas negras expuestas' => 'Exposed wastewater',
        'Baños o sanitarios fuera de servicio' => 'Bathrooms or toilets out of service',
        'Acumulación de aguas residuales' => 'Wastewater accumulation',
        'Daño en planta o sistema de tratamiento' => 'Damage to plant or treatment system',
        'Otra afectación en agua o saneamiento' => 'Other impact on water or sanitation',
        'Falta de energía eléctrica' => 'Power outage',
        'Poste, transformador o red eléctrica dañada' => 'Damaged pole, transformer or power line',
        'Instalaciones eléctricas del inmueble dañadas (sin riesgo inmediato)' => 'Damaged electrical installations in the property (no immediate risk)',
        'Interrupción del servicio de gas' => 'Gas service interruption',
        'Red o medidor de gas dañado (sin fuga activa)' => 'Damaged gas line or meter (no active leak)',
        'Pérdida de telefonía móvil' => 'Mobile service loss',
        'Pérdida de internet o datos' => 'Internet or data service loss',
        'Antena o infraestructura de comunicaciones afectada' => 'Antenna or communications infrastructure affected',
        'Alumbrado público fuera de servicio' => 'Public lighting out of service',
        'Otra afectación en servicios' => 'Other impact on utilities',
        'Hospital o centro de salud afectado' => 'Hospital or health center affected',
        'Colegio, escuela o jardín infantil afectado' => 'School or kindergarten affected',
        'Estación de bomberos, policía u otra entidad de respuesta afectada' => 'Fire station, police or other response entity affected',
        'Alcaldía, gobernación u oficina pública dañada' => 'City hall, governor office or public office damaged',
        'Albergue, coliseo o salón comunal afectado' => 'Shelter, coliseum or community hall affected',
        'Plaza de mercado o centro de abastecimiento' => 'Market square or supply center affected',
        'Planta de agua, tanque o sistema de bombeo afectado' => 'Water plant, tank or pumping system affected',
        'Puente peatonal u otra estructura pública' => 'Pedestrian bridge or other public structure affected',
        'Otra infraestructura pública afectada' => 'Other public infrastructure affected',
        'Desconozco el estado de la infraestructura' => 'Infrastructure status unknown',
        'Grietas en el terreno' => 'Ground cracks',
        'Ladera o talud inestable' => 'Unstable slope or embankment',
        'Caída o posible caída de rocas' => 'Falling or potentially falling rocks',
        'Muro de contención afectado' => 'Retaining wall affected',
        'Árbol con riesgo de caída' => 'Tree at risk of falling',
        'Escombros o estructuras inestables' => 'Debris or unstable structures',
        'Quebrada, río o canal represado' => 'Stream, river or canal blocked',
        'Daño en cauces o estructuras hidráulicas' => 'Damage to channels or hydraulic structures',
        'Elementos con riesgo de desprendimiento' => 'Elements at risk of detachment',
        'Otra situación de riesgo en el entorno' => 'Other environmental risk situation',
        'Familia sin lugar seguro para dormir' => 'Family without a safe place to sleep',
        'Falta de agua potable' => 'Lack of drinking water',
        'Falta de alimentos' => 'Lack of food',
        'Falta de elementos básicos (colchones, cobijas, ropa, kits de higiene, etc.)' => 'Lack of basic items (mattresses, blankets, clothes, hygiene kits, etc.)',
        'Albergue con necesidades básicas' => 'Shelter with unmet basic needs',
        'Comunidad aislada sin suministros' => 'Isolated community without supplies',
        'Pérdida de medios para cocinar' => 'Loss of cooking means',
        'Hacinamiento o alojamiento temporal insuficiente' => 'Overcrowding or insufficient temporary shelter',
        'Varias familias afectadas en el mismo sector' => 'Several families affected in the same area',
        'Otra necesidad básica' => 'Other basic need',
        'Adulto mayor sin apoyo' => 'Older adult without support',
        'Persona con discapacidad' => 'Person with disability',
        'Persona con movilidad reducida' => 'Person with reduced mobility',
        'Mujer gestante o en período de lactancia' => 'Pregnant or breastfeeding woman',
        'Persona que requiere medicamentos o tratamiento' => 'Person requiring medication or treatment',
        'Persona dependiente de equipo médico sin servicio eléctrico' => 'Person dependent on medical equipment without power service',
        'Niños pequeños en condición de vulnerabilidad' => 'Young children in vulnerable conditions',
        'Persona sin red familiar o cuidador' => 'Person without family support or caregiver',
        'Necesidad de transporte especial' => 'Need for special transportation',
        'Otra necesidad especial' => 'Other special need',
        'Negocio o local comercial afectado' => 'Affected business or commercial premises',
        'Bodega o inventario dañado' => 'Damaged warehouse or inventory',
        'Maquinaria, herramientas o equipos dañados' => 'Damaged machinery, tools or equipment',
        'Cultivos o plantaciones afectadas' => 'Affected crops or plantations',
        'Animales de granja o aves afectados' => 'Affected farm animals or birds',
        'Sistema de riego o abastecimiento productivo dañado' => 'Damaged irrigation or productive supply system',
        'Pérdida de acceso a zonas de producción' => 'Loss of access to production areas',
        'Daño en pesca o actividad acuícola' => 'Damage to fishing or aquaculture activity',
        'Pérdida de empleo o ingresos por el desastre' => 'Loss of jobs or income due to the disaster',
        'Otra afectación en actividades productivas' => 'Other impact on productive activities',
        'Daño no clasificado' => 'Unclassified damage',
        'Necesidad no clasificada' => 'Unclassified need',
        'Situación que quiero describir con mis palabras' => 'Situation I want to describe in my own words',
    ];

    private const INDICATOR_DESCRIPTION_MAP = [
        'Daños en casas, apartamentos, edificios o estructuras.' => 'Damage to houses, apartments, buildings or structures.',
        'Problemas que impiden el tránsito o acceso seguro.' => 'Issues that prevent safe transit or access.',
        'Afectaciones en el servicio de agua o en el sistema de saneamiento.' => 'Impacts on water service or the sanitation system.',
        'Interrupción o daños en servicios públicos.' => 'Disruption or damage to utility services.',
        'Daños en lugares o instalaciones de uso comunitario o estatal.' => 'Damage to community or public-use places and facilities.',
        'Amenazas o situaciones de riesgo que pueden afectar a la comunidad.' => 'Threats or risk situations that may affect the community.',
        'Necesidades esenciales de familias o comunidades afectadas.' => 'Essential needs of affected families or communities.',
        'Personas que requieren atención prioritaria.' => 'People who require priority attention.',
        'Afectaciones que impactan medios de vida y producción.' => 'Impacts affecting livelihoods and production.',
        'Situación no contemplada en las opciones anteriores.' => 'Situation not covered by the previous options.',
    ];

    private const MONTH_NAMES = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    private const DAY_NAMES = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

    public static function isEnglishTenant(): bool
    {
        return in_array((string) tenant('id'), self::ENGLISH_TENANTS, true);
    }

    public static function text(string $spanish, string $english): string
    {
        return self::isEnglishTenant() ? $english : $spanish;
    }

    public static function role(?string $value): ?string
    {
        return self::translate($value, self::ROLE_MAP);
    }

    public static function indicator(?string $value): ?string
    {
        return self::translate($value, self::INDICATOR_NAME_MAP);
    }

    public static function indicatorDescription(?string $value): ?string
    {
        return self::translate($value, self::INDICATOR_DESCRIPTION_MAP);
    }

    public static function fieldName(?string $value, ?string $key = null): ?string
    {
        if (! self::isEnglishTenant()) {
            return $value;
        }

        return ($key !== null && array_key_exists($key, self::FIELD_NAME_MAP))
            ? self::FIELD_NAME_MAP[$key]
            : $value;
    }

    public static function fieldPlaceholder(?string $value, ?string $key = null): ?string
    {
        if (! self::isEnglishTenant()) {
            return $value;
        }

        return ($key !== null && array_key_exists($key, self::FIELD_PLACEHOLDER_MAP))
            ? self::FIELD_PLACEHOLDER_MAP[$key]
            : $value;
    }

    public static function optionLabel(?string $modelSelect, ?string $label): ?string
    {
        if (! self::isEnglishTenant() || $label === null) {
            return $label;
        }

        return match ($modelSelect) {
            'App\\Models\\Indicator', 'App\\Models\\Subindicator' => self::indicator($label),
            'Spatie\\Permission\\Models\\Role', 'App\\Models\\Role' => self::role($label),
            default => $label,
        };
    }

    public static function monthNames(): array
    {
        return self::isEnglishTenant()
            ? self::MONTH_NAMES
            : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    }

    public static function monthName(string $month): string
    {
        if (! self::isEnglishTenant()) {
            return match ($month) {
                '01' => 'Enero',
                '02' => 'Febrero',
                '03' => 'Marzo',
                '04' => 'Abril',
                '05' => 'Mayo',
                '06' => 'Junio',
                '07' => 'Julio',
                '08' => 'Agosto',
                '09' => 'Septiembre',
                '10' => 'Octubre',
                '11' => 'Noviembre',
                '12' => 'Diciembre',
                default => '',
            };
        }

        $index = max(1, min(12, (int) $month)) - 1;

        return self::MONTH_NAMES[$index];
    }

    public static function dayNames(): array
    {
        return self::isEnglishTenant()
            ? self::DAY_NAMES
            : ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    }

    public static function dayName(int $day): string
    {
        $names = self::dayNames();

        return $names[$day] ?? '';
    }

    private static function translate(?string $value, array $map): ?string
    {
        if (! self::isEnglishTenant() || $value === null) {
            return $value;
        }

        return $map[$value] ?? $value;
    }
}
