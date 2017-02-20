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

    /**
     * Relacion de muchos a muchos con Staff/Ingreso
     * Con esta relacion obtengo los Staff que asisitieron a la junta 
     */
    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }

    /**
     * Relacion de muchos a muchos con Viviente/Ingreso
     * Con esta relacion obtengo los Staff que asisitieron a la junta 
     */
    public function viviente()
    {
        return $this->belongsTo('App\Viviente');
    }

    
}
