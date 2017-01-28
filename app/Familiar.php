<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{
     protected $table = 'familiares';
    /**
     * The attributes that are mass assignable.
     *
     * @fillable array
     */
    protected $fillable = [
    'viviente_id',
    'tipoFamiliar',
    'nombre',
    'telefono',
    'celular',
    'correo',
    'esViviente'
    ];
    /**
     * Relacion de muchos a uno con Viviente
     */
    public function viviente()
    {
        return $this->belongsTo('App\Viviente');
    }

    /**
     * Relacion de uno a uno con Encuesta
     */
    public function palanca()
    {
        return $this->hasOne('App\Palanca');
    }
}
