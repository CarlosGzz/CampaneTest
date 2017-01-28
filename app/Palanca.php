<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Palanca extends Model
{
    /**
     * Relacion de muchos a uno con Viviente
     */
    public function viviente()
    {
        return $this->belongsTo('App\Viviente');
    }

    /**
     * Relacion de muchos a uno con Viviente
     */
    public function familiar()
    {
        return $this->belongsTo('App\Familiar');
    }
}
