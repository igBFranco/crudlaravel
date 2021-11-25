<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePacientesAddNewForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pacientes', function (Blueprint $table) {
            //
            $table->foreign('pessoa_id')
                    ->references('id')
                    ->on('pessoas');
            $table->foreign('responsavel_id')
                    ->references('id')
                    ->on('pessoas');
            $table->foreign('convenio_id')
                    ->references('id')
                    ->on('convenios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pacientes', function (Blueprint $table) {
            //
            $table->dropForeign('pacientes_pessoa_id_foreign');
            $table->dropForeign('pacientes_responsavel_id_foreign');
            $table->dropForeign('pacientes_convenio_id_foreign');
        });
    }
}
