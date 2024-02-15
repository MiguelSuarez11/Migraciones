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
        Schema::create('entidad_medica', function (Blueprint $table) {
            $table->unsignedTinyInteger('id_entidad')->autoIncrement();
             //foranea de fk_tercero a id_tercero
             $table->unsignedSmallInteger('fk_tercero')->unsigned;
             $table->foreign('fk_tercero')->references('id_tercero')->on('datos_terceros');
            //foranes de fk_tipo_entidad al id_detalle de la tabla detalle
             $table->char('fk_tipo_entidad' , 2);
             $table->foreign('fk_tipo_entidad')->references('pk_id_detalle')->on('detalle');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entidad_medica');
    }
};
