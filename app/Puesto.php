<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    /**
     * Relacion de muchos a uno con Staff/Puesto
     * Con esta relacion obtengo los puestos por campamento de cada Staff
     */
    public function staff()
    {
        return $this->belongsToMany('App\Staff');
    }
}
