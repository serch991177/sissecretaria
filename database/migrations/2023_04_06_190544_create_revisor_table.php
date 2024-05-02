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
        Schema::create('revisor', function (Blueprint $table) {
            $table->id();
            $table->integer('id_informe');
            $table->integer('id_usuario_revisor');
            $table->text('nombre_revisor');
            $table->text('numero_generador');
            $table->text('fecha_generador');
            $table->text('referencia_generada');
            $table->text('dirigido_nombre');
            $table->text('dirigido_cargo')->nullable();
            $table->text('dirigido_unidad')->nullable();
            $table->text('observacion_revisor')->nullable();
            $table->text('estado_revisor');
            $table->text('oficina_revisor')->nullable();
            $table->text('nombre_del_generador')->nullable();
            $table->text('cargo_del_generador')->nullable();
            $table->text('unidad_del_generador')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revisor');
    }
};
