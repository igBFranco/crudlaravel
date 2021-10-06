<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->string('nome_pes',45);
            $table->date('nasc_pes');
            $table->char('genero_pes',1);
            $table->string('cpf_pes',14);
            $table->string('rg_pes',10);
            $table->string('emissor_pes');
            $table->string('rua_pes');
            $table->string('num_pes');
            $table->string('comp_pes')->nullable();
            $table->string('bairro_pes');
            $table->string('cep_pes',10);
            $table->string('cidade_pes');
            $table->char('uf_pes',2);
            $table->string('fone_pes')->nullable();
            $table->string('cel_pes')->nullable();
            $table->string('email_pes')->nullable();
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
        Schema::dropIfExists('pessoas');
    }
}
