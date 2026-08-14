-- Soporte para subcategorias/subindicadores sobre la tabla indicators.
-- Ejecutar una sola vez en cada base tenant que exponga incidentes.

ALTER TABLE indicators
ADD COLUMN IF NOT EXISTS parent_indicator_id BIGINT NULL;

DO $$
BEGIN
    IF NOT EXISTS (
        SELECT 1
        FROM information_schema.table_constraints
        WHERE constraint_name = 'indicators_parent_indicator_id_foreign'
          AND table_name = 'indicators'
    ) THEN
        ALTER TABLE indicators
        ADD CONSTRAINT indicators_parent_indicator_id_foreign
        FOREIGN KEY (parent_indicator_id)
        REFERENCES indicators(id)
        ON DELETE SET NULL;
    END IF;
END $$;

CREATE INDEX IF NOT EXISTS indicators_parent_indicator_id_index
ON indicators(parent_indicator_id);
