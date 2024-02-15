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
        Schema::create('correo', function (Blueprint $table) {
            $table->unsignedSmallInteger('id_usuario')->autoIncrement();
            //foranea de fk_tercero a id_tercero
            $table->string('fk_numero_identificacion' , 12);
            //foranea  de fk_tipo_correo a pk_detalle
            $table->char('fk_tipo_correo' , 2);
            $table->foreign('fk_tipo_correo')->references('pk_id_detalle')->on('detalle');
            //foranea de  fk_prioridad a pk_id_detalle
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
        Schema::dropIfExists('correo');
    }
};
