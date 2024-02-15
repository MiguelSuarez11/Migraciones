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
        Schema::create('datos_terceros', function (Blueprint $table) {
            $table->unsignedSmallInteger('id_tercero')->autoIncrement();
            $table->char('fk_tipoDocumento' , 2);
            $table->foreign('fk_tipoDocumento')->references('pk_id_detalle')->on('detalle');
            $table->string('numero_identificacion' , 12);
            $table->string('primer_nombre' , 50);
            $table->string('segundo_nombre' , 50)->nullable;
            $table->string('primer_apellido' , 50);
            $table->string('segundo_apellido' , 50)->nullable;
            $table->string('razon_social' , 100)->nullable();
            $table->string('direccion' , 100);
            $table->char('fk_estado' , 2);
            $table->foreign('fk_estado')->references('pk_id_detalle')->on('detalle');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_terceros');
    }
};
