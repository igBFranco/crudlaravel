<?php

use Illuminate\Database\Seeder;

class TipoExamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_exames')->insert([
            'nome_tpex' => 'Raio-X',
            'sigla_tpex' => 'RX',
            'desc_tpex' => 'Sem descrição!'
        ]);
    }
}
