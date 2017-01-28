<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    /**
     * Relacion de muchos a muchos con Vehiculo/Campamento
     * Esta relacion es para saber en el campa que se participo
     */
    public function campamentos()
    {
        return $this->belongsToMany('App\Puesto');
    }

    /**
     * Relacion de muchos a muchos con Vehiculo/Staff
     * Esta relacion es para saber el staff al que pertenece
     */
    public function staff()
    {
        return $this->belongsToMany('App\Staff');
    }

}
