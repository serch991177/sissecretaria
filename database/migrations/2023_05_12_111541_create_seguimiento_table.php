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
        Schema::create('seguimiento', function (Blueprint $table) {
            $table->id();
            $table->integer('id_informe_seguimiento')->nullable();
            $table->text('funcionario_generador')->nullable();
            $table->text('funcionario_destino')->nullable();
            $table->integer('id_funcionario_generador')->nullable();
            $table->integer('id_funcionario_destino')->nullable();
            $table->text('estado_seguimiento')->nullable();
            $table->text('fecha_derivacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimiento');
    }
};
