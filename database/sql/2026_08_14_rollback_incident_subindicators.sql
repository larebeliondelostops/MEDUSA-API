BEGIN;

DO $$
DECLARE
    indicator_column TEXT;
    restored_count BIGINT;
BEGIN
    IF to_regclass('public.incident_indicator_backup_20260814') IS NULL THEN
        RAISE EXCEPTION 'No existe la tabla de respaldo incident_indicator_backup_20260814';
    END IF;

    IF EXISTS (
        SELECT 1 FROM information_schema.columns
        WHERE table_schema = 'public' AND table_name = 'incident' AND column_name = 'indicator_id'
    ) THEN
        indicator_column := 'indicator_id';
    ELSIF EXISTS (
        SELECT 1 FROM information_schema.columns
        WHERE table_schema = 'public' AND table_name = 'incident' AND column_name = 'indicator'
    ) THEN
        indicator_column := 'indicator';
    ELSE
        RAISE EXCEPTION 'La tabla incident no tiene indicator ni indicator_id';
    END IF;

    EXECUTE format($sql$
        UPDATE incident
        SET %1$I = backup.previous_indicator_id,
            updated_at = CURRENT_TIMESTAMP
        FROM incident_indicator_backup_20260814 AS backup
        WHERE incident.id = backup.incident_id
    $sql$, indicator_column);

    GET DIAGNOSTICS restored_count = ROW_COUNT;
    RAISE NOTICE 'Incidentes restaurados: %', restored_count;
END $$;

COMMIT;
