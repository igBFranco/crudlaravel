<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //defifindo os atributos iniciais 
    protected $fillable = [
        'nome', 
        'genero'
    ];

    //criar uma funçao para estabelecer a associação entre a classe paciente e a classe consulta

    public function consulta() {
        //especificar o tipo de associação
        return $this->hasMany(Consulta::class);
    }
}
