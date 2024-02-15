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
        Schema::create('cita', function (Blueprint $table) {
            $table->mediumInteger('id_cita')->autoIncrement();
            $table->unsignedSmallInteger('fk_paciente')->unsigned;
            $table->foreign('fk_paciente')->references('id_paciente')->on('paciente');
            $table->unsignedTinyInteger('fk_especialidad' );
            $table->foreign('fk_especialidad')->references('id_especialidad')->on('especialidad');
            $table->unsignedTinyInteger('fk_medico' );
            $table->foreign('fk_medico')->references('id_medico')->on('medico');
            $table->text('valoracion_medica');
            $table->text('comentarios_paciente');
            $table->timestamp('fecha_cita');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cita');
    }
};
