<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viviente extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @fillable array
     */
    protected $fillable = [
        'id','genero', 'nombre', 'appelidoPaterno', 'apellidoMaterno','fechaNacimiento', 'telefonoCasa', 'telefonoCel', 'fechaFinal', 'correo', 'observaciones',  'restriccionesAlimentarias', 'alergias', 'medioCampamento', 'campamento_id', 'staff_id',  'otro',  'pagado',  'cartaDeslinde',  'cartaSeguro'
    ];

    /**
     * Relacion de uno a uno con Encuesta
     */
    public function encuesta()
    {
        return $this->hasOne('App\Encuesta');
    }

    /**
     * Relacion de uno a muchos con Familiares
     */
    public function familiares()
    {
        return $this->hasMany('App\Familiar');
    }

    /**
     * Relacion de uno a muchos con Palancas
     */
    public function palancas()
    {
        return $this->hasMany('App\Palanca');
    }

    /**
     * Relacion de muchos a muchos Viviente/Campamento 
     * Solo para vivientes asistentes a el campamento especifico
     */
    public function vivienteAsistente()
    {
        return $this->belongsToMany('App\Vivientes');
    }

    /**
     * Relacion de muchos a muchos Viviente/Gaia 
     * Solo para vivientes asistentes a el campamento especifico
     */
    public function gaia()
    {
        return $this->belongsTo('App\Gaia');
    }

    /**
     * Relacion de uno a uno con Staff
     */
    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }

    /**
     * Relacion de muchos a uno con Gaia
     */
    public function campamento()
    {
        return $this->belongsTo('App\Campamento');
    }
}
