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
        $this->createView('vista_estado');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->dropView('vista_estado');
    }

    protected function createView($viewName)
    {
        DB::statement("CREATE VIEW {$viewName} AS
            SELECT
                e.pk_id_encabezado AS id_estado,
                d.pk_id_detalle AS id_detalle,
                d.valor AS estado,
                d.abreviatura as abreviatura
            FROM
                `encabezado` AS `e`
                JOIN
                `detalle` AS `d` ON `e`.`pk_id_encabezado` = `d`.`fk_id_encabezado`
            WHERE
                `e`.`pk_id_encabezado` = '1'");
    }

    protected function dropView($viewName)
    {
        DB::statement("DROP VIEW IF EXISTS {$viewName}");
    }
};
