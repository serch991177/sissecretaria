<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\TipoInforme;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@cochabamba.com',
            'password' => ('secret'),
           'id_oficina'=>'0',
            'apellido_paterno'=>'admin',
            'apellido_materno'=>'admin',
            'carnet'=>'11111',
            'celular'=>'77777777',
            'telefono'=>'4444444',
            'cargo'=>'administrador',
            'unidad'=>'alcaldia',
            'estado'=>'activo',
            'generador'=>'true',
            'revisor'=>'true',
            'finalizador'=>'true',
            'administrador'=>'true',
            'nombre_completo'=>'Admin admin admin',
        ]);

        DB::table('informe')->insert([
            'numero'=>'1',
            'id_usuario_generador'=>'0',
            'usuario'=>'0',
            'nombre_dirigido'=>'0',
            'cargo_dirigido'=>'0',
            'unidad_dirigido'=>'0',
            'referencia'=>'0',
            'tipo_informe'=>'0',
            'fecha'=>'0',
            'dato_informe'=>'0',
        ]);     
        
        DB::table('tipo_informes')->insert([
            'nombre' => 'Instructivos', 
        ]);

        DB::table('tipo_informes')->insert([
            'nombre' => 'Memorandums',
        ]);

        /*DB::table('tipo_informes')->insert([
            'nombre' => 'Autos Administrativos',
        ]);

        DB::table('tipo_informes')->insert([
            'nombre' => 'Resoluciones Administrativas',
        ]);

        DB::table('tipo_informes')->insert([
            'nombre' => 'Resoluciones Administrativas Sancionatorias',
        ]);

        DB::table('tipo_informes')->insert([
            'nombre' => 'Resoluciones Administrativas Municipales',
        ]);

        DB::table('tipo_informes')->insert([
            'nombre' => 'Resoluciones De Recurso De Revocatoria',
        ]);

        DB::table('tipo_informes')->insert([
            'nombre' => 'Cartas Externas',
        ]);

        DB::table('tipo_informes')->insert([
            'nombre' => 'Comunicacion Internas',
        ]);

        DB::table('tipo_informes')->insert([
            'nombre' => 'Informe',
        ]);

        DB::table('tipo_informes')->insert([
            'nombre' => 'Informe Tecnico',
        ]);

        DB::table('tipo_informes')->insert([
            'nombre' => 'Informe Legal',
        ]);*/
        DB::table('tipo_informes')->insert([
            'nombre' => 'Convenio',
        ]);
    }
}
