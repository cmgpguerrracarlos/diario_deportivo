<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    protected $fillable = [
        'estadoPartido',
        'fecha'
    ];

    // Hay que agregar esto a todos los modelos que usen fechas para poder tratar como separado dias, mes, año, etc.cle
    protected $dates = [
        'fecha',
    ];


    public function rolesjugadores(){
        return $this->belongsToMany(Jugador::class,"accion_partido")
        ->withTimestamps()->withPivot([
            "accion","minuto"
        ]);
    }

    public function rolesequipos(){
        return $this->belongsToMany(Equipo::class,"estadistica_partido")
        ->withTimestamps()->withPivot(["posesion",
        "tirosTotales",
        "tirosPuerta",
        "corner",
        "offside",
        "faltas",
        "amarillas",
        "rojas"]);
    }
}
