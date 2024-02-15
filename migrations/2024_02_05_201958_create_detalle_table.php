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
        Schema::create('detalle', function (Blueprint $table) {
            $table->char('pk_id_detalle', 2)->primary()->autoIncrement();
            $table->char('fk_id_encabezado' , 2);
            $table->foreign('fk_id_encabezado')->references('pk_id_encabezado')->on('encabezado');
            $table->string('valor', 40);
            $table->string('abreviatura', 3);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle');
    }
};
