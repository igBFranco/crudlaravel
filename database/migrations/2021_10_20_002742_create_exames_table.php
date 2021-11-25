<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exames', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')
                ->constrained('pacientes');
            $table->foreignId('convenio_id')
                ->constrained('convenios');
            $table->foreignId('tipoexame_id')
                ->constrained('tipo_exames');
            $table->foreignId('funcionario_id')
                ->constrained('funcionarios');
            $table->double('valor_exame', 10, 2);
            $table->date('data_exame');
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
        Schema::dropIfExists('exames');
    }
}
