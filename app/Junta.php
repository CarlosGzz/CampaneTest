<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Junta extends Model
{
    /**
     * Relacion de muchos a uno con Campamento
     */
    public function campamento()
    {
        return $this->belongsTo('App\Campamento');
    }

    /**
     * Relacion de muchos a muchos con Staff/Junta
     * Con esta relacion obtengo los Staff que asisitieron a la junta 
     */
    public function staff()
    {
        return $this->belongsToMany('App\Staff');
    }
}
