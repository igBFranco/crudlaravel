<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableMedicosRenameColumnsNomeCrm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicos', function (Blueprint $table) {
            //
            $table->renameColumn('nome', 'nome_medico');
            $table->renameColumn('crm', 'crm_medico');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicos', function (Blueprint $table) {
            //
            $table->renameColumn('nome_medico', 'nome');
            $table->renameColumn('crm_medico', 'crm');
        });
    }
}
