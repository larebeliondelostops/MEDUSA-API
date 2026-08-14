BEGIN;

SELECT pg_advisory_xact_lock(hashtext('backfill_incident_subindicators_v1'));

-- Respaldo permanente para poder restaurar la clasificación anterior.
CREATE TABLE IF NOT EXISTS incident_indicator_backup_20260814 (
    incident_id BIGINT PRIMARY KEY,
    previous_indicator_id BIGINT NULL,
    backed_up_at TIMESTAMP WITHOUT TIME ZONE NOT NULL DEFAULT CURRENT_TIMESTAMP
);

DO $$
DECLARE
    indicator_column TEXT;
    backed_up_count BIGINT;
    updated_count BIGINT;
BEGIN
    IF EXISTS (
        SELECT 1
        FROM information_schema.columns
        WHERE table_schema = 'public'
          AND table_name = 'incident'
          AND column_name = 'indicator_id'
    ) THEN
        indicator_column := 'indicator_id';
    ELSIF EXISTS (
        SELECT 1
        FROM information_schema.columns
        WHERE table_schema = 'public'
          AND table_name = 'incident'
          AND column_name = 'indicator'
    ) THEN
        indicator_column := 'indicator';
    ELSE
        RAISE EXCEPTION 'La tabla incident no tiene indicator ni indicator_id';
    END IF;

    -- Detiene la operación si falta alguna subcategoría neutra requerida.
    IF EXISTS (
        SELECT 1
        FROM (VALUES
            (1::BIGINT, 'Solicitud de revisión de edificación'),
            (2::BIGINT, 'Otra afectación en vía o acceso'),
            (3::BIGINT, 'Otra afectación en agua o saneamiento'),
            (4::BIGINT, 'Otra afectación en servicios'),
            (5::BIGINT, 'Desconozco el estado de la infraestructura'),
            (6::BIGINT, 'Otra situación de riesgo en el entorno'),
            (7::BIGINT, 'Otra necesidad básica'),
            (8::BIGINT, 'Otra necesidad especial'),
            (9::BIGINT, 'Otra afectación en actividades productivas'),
            (10::BIGINT, 'Situación que quiero describir con mis palabras')
        ) AS fallback(category_id, subindicator_name)
        LEFT JOIN indicators AS subindicator
          ON subindicator.parent_indicator_id = fallback.category_id
         AND subindicator.name = fallback.subindicator_name
        WHERE subindicator.id IS NULL
    ) THEN
        RAISE EXCEPTION 'Faltan subcategorías neutras. Ejecuta primero 2026_08_14_seed_territorio_conecta_indicators.sql';
    END IF;

    EXECUTE format($sql$
        INSERT INTO incident_indicator_backup_20260814
            (incident_id, previous_indicator_id, backed_up_at)
        SELECT
            incident.id,
            incident.%1$I,
            CURRENT_TIMESTAMP
        FROM incident
        INNER JOIN indicators AS category ON category.id = incident.%1$I
        WHERE category.parent_indicator_id IS NULL
          AND category.id BETWEEN 1 AND 10
        ON CONFLICT (incident_id) DO NOTHING
    $sql$, indicator_column);

    GET DIAGNOSTICS backed_up_count = ROW_COUNT;

    EXECUTE format($sql$
        WITH fallback(category_id, subindicator_name) AS (
            VALUES
                (1::BIGINT, 'Solicitud de revisión de edificación'),
                (2::BIGINT, 'Otra afectación en vía o acceso'),
                (3::BIGINT, 'Otra afectación en agua o saneamiento'),
                (4::BIGINT, 'Otra afectación en servicios'),
                (5::BIGINT, 'Desconozco el estado de la infraestructura'),
                (6::BIGINT, 'Otra situación de riesgo en el entorno'),
                (7::BIGINT, 'Otra necesidad básica'),
                (8::BIGINT, 'Otra necesidad especial'),
                (9::BIGINT, 'Otra afectación en actividades productivas'),
                (10::BIGINT, 'Situación que quiero describir con mis palabras')
        ), targets AS (
            SELECT
                incident.id AS incident_id,
                subindicator.id AS subindicator_id
            FROM incident
            INNER JOIN fallback ON fallback.category_id = incident.%1$I
            INNER JOIN indicators AS subindicator
              ON subindicator.parent_indicator_id = fallback.category_id
             AND subindicator.name = fallback.subindicator_name
        )
        UPDATE incident
        SET %1$I = targets.subindicator_id,
            updated_at = CURRENT_TIMESTAMP
        FROM targets
        WHERE incident.id = targets.incident_id
    $sql$, indicator_column);

    GET DIAGNOSTICS updated_count = ROW_COUNT;

    RAISE NOTICE 'Columna utilizada: %', indicator_column;
    RAISE NOTICE 'Respaldos nuevos: %', backed_up_count;
    RAISE NOTICE 'Incidentes actualizados: %', updated_count;
END $$;

COMMIT;

-- Verificación final. category_only debe quedar en 0.
WITH classified_incidents AS (
    SELECT
        incident.id,
        COALESCE(
            NULLIF(to_jsonb(incident)->>'indicator_id', '')::BIGINT,
            NULLIF(to_jsonb(incident)->>'indicator', '')::BIGINT
        ) AS indicator_id
    FROM incident
)
SELECT
    COUNT(*) AS total_incidents,
    COUNT(*) FILTER (
        WHERE indicator.parent_indicator_id IS NULL
          AND indicator.id BETWEEN 1 AND 10
    ) AS category_only,
    COUNT(*) FILTER (
        WHERE indicator.parent_indicator_id IS NOT NULL
    ) AS with_subindicator,
    COUNT(*) FILTER (
        WHERE indicator.id IS NULL
    ) AS without_valid_indicator,
    (SELECT COUNT(*) FROM incident_indicator_backup_20260814) AS backed_up
FROM classified_incidents
LEFT JOIN indicators AS indicator ON indicator.id = classified_incidents.indicator_id;
