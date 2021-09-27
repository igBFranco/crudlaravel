<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = [
        'paciente_id',
        'medico_id',
        'data',
        'hora'
    ];

    //criar uma funçao para estabelecer a associação entre a classe consulta e a classe paciente
    public function paciente() {
        return $this->belongsTo(Paciente::class);
    }
    //criar uma funçao para estabelecer a associação entre a classe consulta e a classe medico
    public function medico() {
        return $this->belongsTo(Medico::class);
    }

    public function convenio() {
        return $this->belongsTo(Convenio::class);
    }

}
