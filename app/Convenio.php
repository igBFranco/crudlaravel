<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Convenio;

class Convenio extends Model
{
    //
    protected $fillable = [
        'nome_conv',
        'fone_conv',
        'site_conv',
        'contato_conv',
        'perccons_conv',
        'percexame_conv'
    ];

    public function consulta() {
        //especificar o tipo de associação
        return $this->hasMany(Consulta::class);
    }

    public function paciente() {
        //especificar o tipo de associação
        return $this->hasMany(Paciente::class);
    }
}
