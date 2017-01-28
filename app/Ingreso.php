<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    /**
     * Relacion de muchos a uno con Campamento
     */
    public function campamento()
    {
        return $this->belongsTo('App\Campamento');
    }
}
