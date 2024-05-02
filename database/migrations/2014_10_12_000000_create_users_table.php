<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('id_oficina');
            $table->text('apellido_paterno');
            $table->text('apellido_materno')->nullable();
            $table->text('carnet');
            $table->text('celular');
            $table->text('telefono')->nullable();
            $table->text('cargo');
            $table->text('unidad');
            $table->text('estado');
            $table->boolean('generador')->nullable();
            $table->boolean('revisor')->nullable();
            $table->boolean('finalizador')->nullable();
            $table->boolean('administrador')->nullable();
            $table->text('firma')->nullable();
            $table->text('nombre_completo')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
