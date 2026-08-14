BEGIN;

-- Evita ejecuciones simultáneas del mismo ajuste.
SELECT pg_advisory_xact_lock(hashtext('align_incident_dynamic_form_v1'));

DO $$
BEGIN
    IF NOT EXISTS (SELECT 1 FROM slugs WHERE name = 'incident') THEN
        RAISE EXCEPTION 'No existe el slug incident';
    END IF;

    IF NOT EXISTS (SELECT 1 FROM select_type WHERE id = 1)
       OR NOT EXISTS (SELECT 1 FROM select_type WHERE id = 4)
       OR NOT EXISTS (SELECT 1 FROM select_type WHERE id = 6) THEN
        RAISE EXCEPTION 'Faltan los tipos de campo Input, Select o Map Marker';
    END IF;
END $$;

-- La aplicación histórica asignó algunos IDs manualmente; se sincronizan antes de insertar.
SELECT setval(
    pg_get_serial_sequence('modules', 'id'),
    COALESCE((SELECT MAX(id) FROM modules), 1),
    true
);

SELECT setval(
    pg_get_serial_sequence('fields', 'id'),
    COALESCE((SELECT MAX(id) FROM fields), 1),
    true
);

SELECT setval(
    pg_get_serial_sequence('forms', 'id'),
    COALESCE((SELECT MAX(id) FROM forms), 1),
    true
);

-- Incident usa controladores dedicados, por eso no necesita namespace de CRUD dinámico.
INSERT INTO modules (name, description, slug, namespace, created_at, updated_at)
SELECT
    'Incidentes',
    'Módulo para la gestión de incidentes ciudadanos',
    slug.id,
    NULL,
    CURRENT_TIMESTAMP,
    CURRENT_TIMESTAMP
FROM slugs AS slug
WHERE slug.name = 'incident'
  AND NOT EXISTS (
      SELECT 1
      FROM modules AS module
      WHERE module.slug = slug.id
  );

UPDATE modules AS module
SET name = 'Incidentes',
    description = 'Módulo para la gestión de incidentes ciudadanos',
    updated_at = CURRENT_TIMESTAMP
FROM slugs AS slug
WHERE module.slug = slug.id
  AND slug.name = 'incident';

CREATE TEMP TABLE incident_form_field_data (
    sort_order INTEGER NOT NULL,
    name VARCHAR(255) NOT NULL,
    placeholder VARCHAR(255) NULL,
    key VARCHAR(255) NOT NULL,
    type BIGINT NOT NULL,
    required BOOLEAN NOT NULL,
    schema VARCHAR(255) NOT NULL,
    model_select VARCHAR(255) NULL
) ON COMMIT DROP;

INSERT INTO incident_form_field_data
    (sort_order, name, placeholder, key, type, required, schema, model_select)
VALUES
    (1, 'Categoría', 'Seleccione una categoría', 'CategoryId', 4, TRUE, 'number', 'App\Models\Category'),
    (2, 'Subcategoría', 'Seleccione una subcategoría', 'IndicatorId', 4, TRUE, 'number', 'App\Models\Subindicator'),
    (3, 'Dirección', 'Ingrese la dirección', 'address', 1, FALSE, 'text', NULL),
    (4, 'Descripción', 'Describa la afectación o necesidad', 'description', 1, TRUE, 'text', NULL),
    (5, 'Ubicación', NULL, 'pointCoordinates', 6, TRUE, 'position', NULL);

-- Reutiliza campos existentes por key y crea únicamente los faltantes.
INSERT INTO fields
    (name, placeholder, key, type, required, schema, model_select, created_at, updated_at)
SELECT
    source.name,
    source.placeholder,
    source.key,
    source.type,
    source.required,
    source.schema,
    source.model_select,
    CURRENT_TIMESTAMP,
    CURRENT_TIMESTAMP
FROM incident_form_field_data AS source
WHERE NOT EXISTS (
    SELECT 1
    FROM fields AS field
    WHERE field.key = source.key
)
ORDER BY source.sort_order;

-- Alinea campos propios de incidentes sin alterar address, que es compartido por otros módulos.
UPDATE fields AS field
SET name = source.name,
    placeholder = source.placeholder,
    type = source.type,
    required = source.required,
    schema = source.schema,
    model_select = source.model_select,
    updated_at = CURRENT_TIMESTAMP
FROM incident_form_field_data AS source
WHERE field.key = source.key
  AND source.key <> 'address';

-- Vincula los cinco campos al módulo conservando el orden visual del formulario.
WITH incident_module AS (
    SELECT module.id
    FROM modules AS module
    INNER JOIN slugs AS slug ON slug.id = module.slug
    WHERE slug.name = 'incident'
    ORDER BY module.id
    LIMIT 1
), selected_fields AS (
    SELECT DISTINCT ON (source.key)
        source.sort_order,
        field.id AS field_id
    FROM incident_form_field_data AS source
    INNER JOIN fields AS field ON field.key = source.key
    ORDER BY source.key, field.id
)
INSERT INTO forms (module, field, created_at, updated_at)
SELECT
    incident_module.id,
    selected_fields.field_id,
    CURRENT_TIMESTAMP,
    CURRENT_TIMESTAMP
FROM incident_module
CROSS JOIN selected_fields
WHERE NOT EXISTS (
    SELECT 1
    FROM forms AS form
    WHERE form.module = incident_module.id
      AND form.field = selected_fields.field_id
)
ORDER BY selected_fields.sort_order;

COMMIT;

-- Debe retornar cinco filas en este orden.
SELECT
    module.id AS module_id,
    module.name AS module,
    slug.name AS slug,
    form.id AS form_id,
    field.id AS field_id,
    field.name AS field,
    field.key,
    field.model_select
FROM modules AS module
INNER JOIN slugs AS slug ON slug.id = module.slug
INNER JOIN forms AS form ON form.module = module.id
INNER JOIN fields AS field ON field.id = form.field
WHERE slug.name = 'incident'
ORDER BY form.id;
