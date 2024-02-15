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
    public function up(): void
    {
        DB::statement('CREATE VIEW `vista_tipoDocumento` AS
        SELECT
            e.pk_id_encabezado AS `id_tipo_documento`,
            d.pk_id_detalle AS `id_detalle`,
            d.valor AS `tipo_documento`,
            d.abreviatura as `abreviatura`
        FROM
            `encabezado` as `e`
                JOIN
            `detalle` as `d`
            ON e.pk_id_encabezado = d.fk_id_encabezado
        WHERE
            e.pk_id_encabezado = 3;');
}
/**
* Reverse the migrations.
*/
public function down()
{
DB::statement('DROP VIEW `vista_tipoDocumento`');
}
};
