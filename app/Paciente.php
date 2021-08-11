<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //defifindo os atributos iniciais 
    protected $fillable = ['nome', 'genero'];
}
