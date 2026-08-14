BEGIN;

-- Los IDs 1 al 10 se conservan para no romper referencias existentes.
WITH category_data (id, name, description) AS (
    VALUES
        (1, 'Vivienda o edificación', 'Daños en casas, apartamentos, edificios o estructuras.'),
        (2, 'Vía o acceso', 'Problemas que impiden el tránsito o acceso seguro.'),
        (3, 'Agua y saneamiento', 'Afectaciones en el servicio de agua o en el sistema de saneamiento.'),
        (4, 'Energía, gas y comunicaciones', 'Interrupción o daños en servicios públicos.'),
        (5, 'Infraestructura pública', 'Daños en lugares o instalaciones de uso comunitario o estatal.'),
        (6, 'Riesgo visible en el entorno', 'Amenazas o situaciones de riesgo que pueden afectar a la comunidad.'),
        (7, 'Necesidad básica de una familia o comunidad', 'Necesidades esenciales de familias o comunidades afectadas.'),
        (8, 'Necesidad especial de una persona o población', 'Personas que requieren atención prioritaria.'),
        (9, 'Negocio, cultivo o actividad productiva', 'Afectaciones que impactan medios de vida y producción.'),
        (10, 'Otra afectación', 'Situación no contemplada en las opciones anteriores.')
)
UPDATE indicators AS indicator
SET name = category_data.name,
    description = category_data.description,
    parent_indicator_id = NULL,
    updated_at = CURRENT_TIMESTAMP
FROM category_data
WHERE indicator.id = category_data.id;

-- Si alguna categoría no existe, se crea usando su ID contractual.
WITH category_data (id, name, description) AS (
    VALUES
        (1, 'Vivienda o edificación', 'Daños en casas, apartamentos, edificios o estructuras.'),
        (2, 'Vía o acceso', 'Problemas que impiden el tránsito o acceso seguro.'),
        (3, 'Agua y saneamiento', 'Afectaciones en el servicio de agua o en el sistema de saneamiento.'),
        (4, 'Energía, gas y comunicaciones', 'Interrupción o daños en servicios públicos.'),
        (5, 'Infraestructura pública', 'Daños en lugares o instalaciones de uso comunitario o estatal.'),
        (6, 'Riesgo visible en el entorno', 'Amenazas o situaciones de riesgo que pueden afectar a la comunidad.'),
        (7, 'Necesidad básica de una familia o comunidad', 'Necesidades esenciales de familias o comunidades afectadas.'),
        (8, 'Necesidad especial de una persona o población', 'Personas que requieren atención prioritaria.'),
        (9, 'Negocio, cultivo o actividad productiva', 'Afectaciones que impactan medios de vida y producción.'),
        (10, 'Otra afectación', 'Situación no contemplada en las opciones anteriores.')
)
INSERT INTO indicators (id, name, description, parent_indicator_id, created_at, updated_at)
SELECT id, name, description, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP
FROM category_data
ON CONFLICT (id) DO NOTHING;

CREATE TEMP TABLE territorio_conecta_subindicators (
    sort_order BIGSERIAL,
    parent_indicator_id BIGINT NOT NULL,
    name TEXT NOT NULL,
    description TEXT NULL
) ON COMMIT DROP;

INSERT INTO territorio_conecta_subindicators (parent_indicator_id, name, description)
VALUES
    (1, 'Grietas visibles', NULL),
    (1, 'Daños en paredes, techos o pisos', NULL),
    (1, 'Daño estructural (columnas, vigas, muros)', NULL),
    (1, 'Desprendimientos (tejas, vidrios, revoque, etc.)', NULL),
    (1, 'Colapso parcial', NULL),
    (1, 'Colapso total', NULL),
    (1, 'Vivienda aparentemente inhabitable', NULL),
    (1, 'Acceso bloqueado', NULL),
    (1, 'Daños en zonas comunes (edificio/conjunto)', NULL),
    (1, 'Solicitud de revisión de edificación', NULL),
    (2, 'Calle bloqueada', NULL),
    (2, 'Carretera dañada', NULL),
    (2, 'Derrumbe o caída de rocas sobre la vía', NULL),
    (2, 'Puente o alcantarilla afectada', NULL),
    (2, 'Hundimiento o grietas en la vía', NULL),
    (2, 'Árboles, postes u objetos bloqueando el paso', NULL),
    (2, 'Acceso peatonal afectado', NULL),
    (2, 'Comunidad o vereda aislada', NULL),
    (2, 'Acceso a hospital, colegio u otro servicio bloqueado', NULL),
    (2, 'Otra afectación en vía o acceso', NULL),
    (3, 'Falta de agua', NULL),
    (3, 'Tubería rota o fuga de agua', NULL),
    (3, 'Agua aparentemente contaminada (color, olor, sabor)', NULL),
    (3, 'Daño en tanque o sistema de almacenamiento', NULL),
    (3, 'Alcantarillado rebosado', NULL),
    (3, 'Aguas negras expuestas', NULL),
    (3, 'Baños o sanitarios fuera de servicio', NULL),
    (3, 'Acumulación de aguas residuales', NULL),
    (3, 'Daño en planta o sistema de tratamiento', NULL),
    (3, 'Otra afectación en agua o saneamiento', NULL),
    (4, 'Falta de energía eléctrica', NULL),
    (4, 'Poste, transformador o red eléctrica dañada', NULL),
    (4, 'Instalaciones eléctricas del inmueble dañadas (sin riesgo inmediato)', NULL),
    (4, 'Interrupción del servicio de gas', NULL),
    (4, 'Red o medidor de gas dañado (sin fuga activa)', NULL),
    (4, 'Pérdida de telefonía móvil', NULL),
    (4, 'Pérdida de internet o datos', NULL),
    (4, 'Antena o infraestructura de comunicaciones afectada', NULL),
    (4, 'Alumbrado público fuera de servicio', NULL),
    (4, 'Otra afectación en servicios', NULL),
    (5, 'Hospital o centro de salud afectado', NULL),
    (5, 'Colegio, escuela o jardín infantil afectado', NULL),
    (5, 'Estación de bomberos, policía u otra entidad de respuesta afectada', NULL),
    (5, 'Alcaldía, gobernación u oficina pública dañada', NULL),
    (5, 'Albergue, coliseo o salón comunal afectado', NULL),
    (5, 'Plaza de mercado o centro de abastecimiento', NULL),
    (5, 'Planta de agua, tanque o sistema de bombeo afectado', NULL),
    (5, 'Puente peatonal u otra estructura pública', NULL),
    (5, 'Otra infraestructura pública afectada', NULL),
    (5, 'Desconozco el estado de la infraestructura', NULL),
    (6, 'Grietas en el terreno', NULL),
    (6, 'Ladera o talud inestable', NULL),
    (6, 'Caída o posible caída de rocas', NULL),
    (6, 'Muro de contención afectado', NULL),
    (6, 'Árbol con riesgo de caída', NULL),
    (6, 'Escombros o estructuras inestables', NULL),
    (6, 'Quebrada, río o canal represado', NULL),
    (6, 'Daño en cauces o estructuras hidráulicas', NULL),
    (6, 'Elementos con riesgo de desprendimiento', NULL),
    (6, 'Otra situación de riesgo en el entorno', NULL),
    (7, 'Familia sin lugar seguro para dormir', NULL),
    (7, 'Falta de agua potable', NULL),
    (7, 'Falta de alimentos', NULL),
    (7, 'Falta de elementos básicos (colchones, cobijas, ropa, kits de higiene, etc.)', NULL),
    (7, 'Albergue con necesidades básicas', NULL),
    (7, 'Comunidad aislada sin suministros', NULL),
    (7, 'Pérdida de medios para cocinar', NULL),
    (7, 'Hacinamiento o alojamiento temporal insuficiente', NULL),
    (7, 'Varias familias afectadas en el mismo sector', NULL),
    (7, 'Otra necesidad básica', NULL),
    (8, 'Adulto mayor sin apoyo', NULL),
    (8, 'Persona con discapacidad', NULL),
    (8, 'Persona con movilidad reducida', NULL),
    (8, 'Mujer gestante o en período de lactancia', NULL),
    (8, 'Persona que requiere medicamentos o tratamiento', NULL),
    (8, 'Persona dependiente de equipo médico sin servicio eléctrico', NULL),
    (8, 'Niños pequeños en condición de vulnerabilidad', NULL),
    (8, 'Persona sin red familiar o cuidador', NULL),
    (8, 'Necesidad de transporte especial', NULL),
    (8, 'Otra necesidad especial', NULL),
    (9, 'Negocio o local comercial afectado', NULL),
    (9, 'Bodega o inventario dañado', NULL),
    (9, 'Maquinaria, herramientas o equipos dañados', NULL),
    (9, 'Cultivos o plantaciones afectadas', NULL),
    (9, 'Animales de granja o aves afectados', NULL),
    (9, 'Sistema de riego o abastecimiento productivo dañado', NULL),
    (9, 'Pérdida de acceso a zonas de producción', NULL),
    (9, 'Daño en pesca o actividad acuícola', NULL),
    (9, 'Pérdida de empleo o ingresos por el desastre', NULL),
    (9, 'Otra afectación en actividades productivas', NULL),
    (10, 'Daño no clasificado', NULL),
    (10, 'Necesidad no clasificada', NULL),
    (10, 'Situación que quiero describir con mis palabras', NULL);

UPDATE indicators AS indicator
SET description = source.description,
    updated_at = CURRENT_TIMESTAMP
FROM territorio_conecta_subindicators AS source
WHERE indicator.parent_indicator_id = source.parent_indicator_id
  AND indicator.name = source.name;

INSERT INTO indicators (name, description, parent_indicator_id, created_at, updated_at)
SELECT source.name,
       source.description,
       source.parent_indicator_id,
       CURRENT_TIMESTAMP,
       CURRENT_TIMESTAMP
FROM territorio_conecta_subindicators AS source
WHERE NOT EXISTS (
    SELECT 1
    FROM indicators AS indicator
    WHERE indicator.parent_indicator_id = source.parent_indicator_id
      AND indicator.name = source.name
)
ORDER BY source.sort_order;

-- Sincroniza la secuencia por si fue necesario insertar alguna categoría con ID explícito.
SELECT setval(
    pg_get_serial_sequence('indicators', 'id'),
    COALESCE((SELECT MAX(id) FROM indicators), 1),
    true
);

COMMIT;

-- Verificación esperada: 10 categorías y 93 subcategorías.
SELECT
    COUNT(*) FILTER (WHERE parent_indicator_id IS NULL AND id BETWEEN 1 AND 10) AS categories,
    COUNT(*) FILTER (WHERE parent_indicator_id BETWEEN 1 AND 10) AS subcategories
FROM indicators;
