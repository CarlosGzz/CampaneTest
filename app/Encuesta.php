<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{

	/**
     * The attributes that are mass assignable.
     *
     * @fillable array
     */
    protected $fillable = [
    'viviente_id',
    'reservado',
    'sabiduria',
    'idealista',
    'explosivo',
    'optimismo',
    'prudencia',
    'disciplina',
    'pasion',
    'hipersensibilidad',
    'generosidad',
    'handy',
    'teson',
    'elocuente',
    'aventado',
    'empatia',
    'misterioso',
    'fortaleza',
    'improvisar',
    'afable',
    'lealtad',
    'franco',
    'sobreprotector',
    'creativo',
    'movido',
    'triunfar',
    'personalidad',
    'mismo',
    'cualidades',
    'defectos',
    'fiesta'
    ];
    /**
     * Relacion de uno a uno con Viviente
     */
    public function viviente()
    {
        return $this->belongsTo('App\Viviente');
    }
}
