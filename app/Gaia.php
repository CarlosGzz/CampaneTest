<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gaia extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @fillable array
     */
    protected $fillable = [
       'id', 'gaia'
    ];

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
