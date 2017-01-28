<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Egreso extends Model
{
    /**
     * Relacion de muchos a uno con Campamento
     */
    public function campamento()
    {
        return $this->belongsTo('App\Campamento');
    }

    /**
     * Relacion de muchos a uno con Staff
     */
    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }

    /**
     * Relacion de muchos a uno con Area
     */
    public function area()
    {
        return $this->belongsTo('App\Area');
    }
}
