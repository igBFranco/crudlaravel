<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableConsultasAddNewColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consultas', function (Blueprint $table) {
            //
            $table->foreignId('convenio_cons')
                    ->constrained('convenios')
                    ->after('medico_id');
            $table->decimal('valor_cons', 10, 2)
                    ->after('hora_cons');
            $table->string('observacao_cons', 360)
                    ->nullable();
            $table->date('retorno_cons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consultas', function (Blueprint $table) {
            $table->dropForeign('consultas_convenio_cons_foreign');
            $table->dropColumn('convenio_cons');
            $table->dropColumn('valor_cons');
            $table->dropColumn('observacao_cons');
            $table->dropColumn('retorno_cons');
        });
    }
}
