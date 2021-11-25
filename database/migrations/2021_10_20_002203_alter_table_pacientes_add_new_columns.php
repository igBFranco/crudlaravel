<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePacientesAddNewColumns extends Migration
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
            $table->unsignedBigInteger('pessoa_id')->nullable()->after('id');
            $table->unsignedBigInteger('responsavel_id')->nullable()->after('pessoa_id');
            $table->unsignedBigInteger('convenio_id')->nullable()->after('responsavel_id');
            $table->string('carteirinha_pac')->nullable()->after('convenio_id');
            $table->date('validadecarteirinha_pac')->nullable()->after('carteirinha_pac');
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
            $table->dropColumn('pessoa_id');
            $table->dropColumn('responsavel_id');
            $table->dropColumn('convenio_id');
            $table->dropColumn('carteirinha_pac');
            $table->dropColumn('validadecarteirinha_pac');
        });
    }
}
