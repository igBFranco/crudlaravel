<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pessoa_id')
                    ->constrained('pessoas');
            $table->foreignId('cargo_id')
                    ->constrained('cargos');
            $table->string('ctps_func', 15);
            $table->string('pispasep_func', 15);
            $table->double('salario_func', 10, 2);
            $table->integer('cargahoraria_func');
            $table->date('dataadmissao_func');
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
        Schema::dropIfExists('funcionarios');
    }
}
