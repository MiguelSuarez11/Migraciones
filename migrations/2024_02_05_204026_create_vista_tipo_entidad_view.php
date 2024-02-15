<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    DB::statement('CREATE VIEW vista_tipoEntidad AS
        SELECT
            e.pk_id_encabezado AS id_tipoEntidad,
            d.pk_id_detalle AS id_detalle,
            d.valor AS tipoEntidad
        FROM
            `encabezado` AS `e`
                JOIN
            `detalle` AS `d` ON `e`.`pk_id_encabezado` = `d`.`fk_id_encabezado`
        WHERE
            `e`.`pk_id_encabezado` = 6');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS vista_tipoEntidad');
    }
};
