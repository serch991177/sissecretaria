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
        Schema::create('informe', function (Blueprint $table) {
            $table->id();
            $table->text('numero')->nullable();
            $table->integer('id_usuario_generador')->nullable();
            $table->json('usuario')->nullable();
            $table->text('nombre_dirigido')->nullable();
            $table->text('cargo_dirigido')->nullable();
            $table->text('unidad_dirigido')->nullable();
            $table->text('referencia')->nullable();
            $table->text('tipo_informe')->nullable();
            $table->text('fecha')->nullable();
            $table->text('dato_informe');
            $table->text('observacion')->nullable();
            $table->text('estado')->nullable();
            $table->text('cite')->nullable();
            $table->text('id_oficina')->nullable();
            $table->text('oficina')->nullable();
            $table->text('fecha_finalizacion')->nullable();
            $table->text('fecha_creacion')->nullable();
            $table->text('logo')->nullable();
            $table->text('cite_informes')->nullable();
            $table->text('cite_comunicaciones')->nullable();
            $table->text('cite_memo')->nullable();
            $table->text('gestion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informe');
    }
};
