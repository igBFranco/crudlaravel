<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    //
    protected $fillable = [
        'nome',
        'crm'
    ];

    //criar uma funçao para estabelecer a associação entre a classe medico e a classe consulta

    public function consulta() {
        //especificar o tipo de associação
        return $this->hasMany(Consulta::class);
    }

    public function especialidade() {
        return $this->belongsTo(Especialidade::class);
    }
    
}
