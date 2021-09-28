<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoExame extends Model
{
    //
    protected $fillable = [
        'nome_tpex',
        'sigla_tpex',
        'desc_tpex'
    ];
}
