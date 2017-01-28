<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gaia extends Model
{
    /**
     * Relacion de uno a muchos con Staff
     */
    public function staff()
    {
        return $this->hasMany('App\Staff');
    }

    /**
     * Relacion de muchos a uno con egresos
     */
    public function vivientes()
    {
        return $this->belongsToMany('App\Viviente');
    }
}
