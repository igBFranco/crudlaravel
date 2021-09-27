<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    //
    protected $fillable = [
        'nome_esp',
        'sigla_esp',
        'obs_esp'
    ];

    //associacao entre especialidade e médico
    public function medico(){
        return $this->hasMany(Especialidade::class);
    }
}



