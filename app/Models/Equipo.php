<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'nomCorto',
        'tresLetras'
    ];

    public function rolesligas(){
        return $this->belongsToMany('App\Models\Liga');
    }

    public function rolespartidos(){
        return $this->belongsToMany('App\Models\Partido');
    }

    public function integrantes(){
        return $this->hasMany('App\Models\Jugador');
    }
}
