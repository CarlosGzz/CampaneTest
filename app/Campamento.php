<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campamento extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @fillable array
     */
    protected $fillable = [
       'id', 'nombre', 'fechaInicio', 'fechaFinal', 'actual'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @hidden array
     */
    protected $hidden = [
        
    ];

    /**
     * Relacion de uno a muchos Ingresos
     */
    public function ingresos()
    {
        return $this->hasMany('App\Ingreso');
    }

    /**
     * Relacion de uno a muchos Egresos
     */
    public function egresos()
    {
        return $this->hasMany('App\Egreso');
    }

    /**
     * Relacion de uno a muchos Campamento/Vivientes
     */
    public function juntas()
    {
        return $this->hasMany('App\Junta');
    }

    /**
     * Relacion de muchos a muchos Campamento/Staff 
     * Solo para asistentes a el campamento especifico
     */
    public function staffAsistente()
    {
        return $this->belongsToMany('App\Staff')->withPivot('pagado', 'puesto_id', 'vehiculo_id');
    }

    /**
     * Relacion de muchos a muchos Campamento/Viviente 
     * Solo para vivientes asistentes a el campamento especifico
     */
    public function vivienteAsistente()
    {
        return $this->belongsToMany('App\Vivientes');
    }

    /**
     * Relacion de muchos a muchos con Campamento/Vehiculos
     * Esta relacion es para obtener los vehiculos en el campamento
     */
    public function vehiculos()
    {
        return $this->belongsToMany('App\Vehiculo');
    }

    /**
     * Relacion de uno a muchos Ingresos
     */
    public function vivientes()
    {
        return $this->hasMany('App\Viviente');
    }
}
