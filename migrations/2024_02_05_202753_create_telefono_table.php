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
        Schema::create('telefono', function (Blueprint $table) {
            $table->unsignedSmallInteger('id_usuario')->autoIncrement();
            $table->unsignedSmallInteger('fk_tercero')->unsigned;
            $table->foreign('fk_tercero')->references('id_tercero')->on('datos_terceros');
            $table->char('fk_tipo_contacto' , 2);
            $table->foreign('fk_tipo_contacto')->references('pk_id_detalle')->on('detalle');
            $table->char('fk_prioridad' , 2);
            $table->foreign('fk_prioridad')->references('pk_id_detalle')->on('detalle');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telefono');
    }
};
