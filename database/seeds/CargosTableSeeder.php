<?php

use Illuminate\Database\Seeder;

class CargosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //para utilizar o Factory nao é necessaria a instancia DB

        /*DB::table('cargos')->insert([
            'nome_cargo' => 'Secretária(o)',
            'desc_cargo' => 'Sem descrição cadastrada!'
        ]);*/

        factory(\App\Cargo::class, 20)->create();
    }
}
