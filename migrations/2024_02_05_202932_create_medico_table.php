<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medico', function (Blueprint $table) {
            $table->unsignedTinyInteger('id_medico')->autoIncrement();
            //foranea de fk_tercero a id_tercero
            $table->unsignedSmallInteger('fk_tercero')->unsigned;
            $table->foreign('fk_tercero')->references('id_tercero')->on('datos_terceros');
            //foranea de fk_especialidad a al id_especialidad de la tabla especialidad
            $table->unsignedTinyInteger('fk_especialidad')->unsigned;
            $table->foreign('fk_especialidad')->references('id_especialidad')->on('especialidad');
            //foranea de fk_genero  al pk_id_detalle de la tabla de detalles
            $table->char('fk_genero' , 2);
            $table->foreign('fk_genero')->references('pk_id_detalle')->on('detalle');
            $table->date('fecha_nacimiento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medico');
    }
};
