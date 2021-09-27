<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    //
    protected $fillable = [
        'nome_cargo',
        'desc_cargo'
    ];
}
