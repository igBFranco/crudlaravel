<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableConsultasChangeColumns extends Migration
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
            $table->renameColumn('data', 'data_cons');
            $table->renameColumn('hora', 'hora_cons');
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
            //
            $table->renameColumn('data_cons', 'data');
            $table->renameColumn('hora_cons', 'hora');
        });
    }
}
