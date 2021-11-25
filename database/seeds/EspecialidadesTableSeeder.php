<?php

use Illuminate\Database\Seeder;

class EspecialidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('especialidades')->insert([
            'nome_esp' => 'Clínico Geral',
            'sigla_esp' => 'CLG',
            'obs_esp' => 'Sem observação cadastrada!'
        ]);
    }
}
