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
        Schema::create('paciente', function (Blueprint $table) {
            $table->unsignedSmallInteger('id_paciente')->autoIncrement();
            //foranea de fk_tercero a id_tercero
            $table->unsignedSmallInteger('fk_tercero')->unsigned;
            $table->foreign('fk_tercero')->references('id_tercero')->on('datos_terceros');
             //foranea de fk_genero  al pk_id_detalle de la tabla de detalles
           $table->char('fk_genero' , 2);
           $table->foreign('fk_genero')->references('pk_id_detalle')->on('detalle');
           $table->date('fecha_nacimiento');
           //foranea fk entidad que hace referencia al id de la tabla entidad medica
           $table->unsignedTinyInteger('fk_entidad')->unsigned;
           $table->foreign('fk_entidad')->references('id_entidad')->on('entidad_medica');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paciente');
    }
};
