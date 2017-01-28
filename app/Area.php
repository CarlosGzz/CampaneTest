<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    /**
     * Relacion de uno a muchos con Egresos
     */
    public function egresos()
    {
        return $this->hasMany('App\egresos');
    }
}
