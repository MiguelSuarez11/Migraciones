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
        Schema::create('usuario', function (Blueprint $table) {
            $table->unsignedSmallInteger('id_usuario')->autoIncrement();
            $table->unsignedSmallInteger('fk_tercero')->unsigned;
            $table->foreign('fk_tercero')->references('id_tercero')->on('datos_terceros');
            $table->string('contraseña',12);
            $table->char('fk_rol' , 2);
            $table->foreign('fk_rol')->references('pk_id_detalle')->on('detalle');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
