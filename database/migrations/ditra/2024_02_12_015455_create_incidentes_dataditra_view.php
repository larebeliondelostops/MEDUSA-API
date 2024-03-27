<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE OR REPLACE VIEW incidentes_dataditra AS
            SELECT incident.id,
                incident.indicator,
                incident.day,
                incident.month,
                incident.year,
                incident.created_at,
                incident.latitude,
                incident.longitude
            FROM incident
            UNION ALL
            SELECT data_ditra.id,
                data_ditra.indicator,
                    CASE
                        WHEN data_ditra.day::text = 'DOMINGO'::text THEN '0'::text
                        WHEN data_ditra.day::text = 'LUNES'::text THEN '1'::text
                        WHEN data_ditra.day::text = 'MARTES'::text THEN '2'::text
                        WHEN data_ditra.day::text = 'MIERCOLES'::text THEN '3'::text
                        WHEN data_ditra.day::text = 'JUEVES'::text THEN '4'::text
                        WHEN data_ditra.day::text = 'VIERNES'::text THEN '5'::text
                        WHEN data_ditra.day::text = 'SABADO'::text THEN '6'::text
                        ELSE NULL::text
                    END AS day,
                    CASE
                        WHEN data_ditra.month::text = 'ENERO'::text THEN '1'::text
                        WHEN data_ditra.month::text = 'FEBRERO'::text THEN '2'::text
                        WHEN data_ditra.month::text = 'MARZO'::text THEN '3'::text
                        WHEN data_ditra.month::text = 'ABRIL'::text THEN '4'::text
                        WHEN data_ditra.month::text = 'MAYO'::text THEN '5'::text
                        WHEN data_ditra.month::text = 'JUNIO'::text THEN '6'::text
                        WHEN data_ditra.month::text = 'JULIO'::text THEN '7'::text
                        WHEN data_ditra.month::text = 'AGOSTO'::text THEN '8'::text
                        WHEN data_ditra.month::text = 'SEPTIEMBRE'::text THEN '9'::text
                        WHEN data_ditra.month::text = 'OCTUBRE'::text THEN '10'::text
                        WHEN data_ditra.month::text = 'NOVIEMBRE'::text THEN '11'::text
                        WHEN data_ditra.month::text = 'DICIEMBRE'::text THEN '12'::text
                        ELSE NULL::text
                    END AS month,
                data_ditra.year::character varying AS year,
                data_ditra.occurrence_date AS created_at,
                data_ditra.latitude,
                data_ditra.longitude
            FROM data_ditra
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS incidentes_dataditra");
    }
};
