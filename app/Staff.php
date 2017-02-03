<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @fillable array
     */
    protected $fillable = [
       'id', 'nombre', 'apellidoMaterno', 'apellidoPaterno', 'fechaNacimiento', 'genero', 'carrera', 'universidad', 'estudianteGraduado', 'gaia_id', 'rolDeseado', 'pulsera', 'correo', 'telefonoCel','activo'
    ];

	/**
     * Relacion de muchos a uno con Gaia
     */
    public function gaia()
    {
        return $this->belongsTo('App\Gaia');
    }

    /**
     * Relacion de uno a muchos con egresos
     */
    public function egresos()
    {
        return $this->hasMany('App\Egreso');
    }

    /**
     * Relacion de uno a muchos con Viviente
     */
    public function vivientes()
    {
        return $this->hasMany('App\Viviente');
    }

    /**
     * Relacion de muchos a muchos con Juntas
     * Esta relacion es para saber las juntas a las que asistio el staff
     */
    public function juntas()
    {
        return $this->belongsToMany('App\Junta');
    }

    /**
     * Relacion de muchos a muchos con Staff/Puesto
     * Esta relacion es para saber el puesto en el campa que se participo
     */
    public function puesto()
    {
        return $this->belongsToMany('App\Puesto');
    }

    /**
     * Relacion de muchos a muchos con Campamento
     * Esta relacion es para saber el puesto en el campa que se participo
     */
    public function campamento()
    {
        return $this->belongsToMany('App\Campamento');
    }

    /**
     * Relacion de muchos a muchos Viviente/Campamento 
     * Solo para vivientes asistentes a el campamento especifico
     */
    public function vivienteAsistente()
    {
        return $this->belongsToMany('App\Vivientes');
    }
}
