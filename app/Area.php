<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @fillable array
     */
    protected $fillable = [
       'id', 'area', 'activa', 
    ];
    /**
     * Relacion de uno a muchos con Egresos
     */
    public function egresos()
    {
        return $this->hasMany('App\egresos');
    }
}
