<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liga extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombreLiga',
        'participantes',
        'sistemaDeJuego'
    ];


    public function roles(){
        return $this->belongsToMany(Equipo::class)->withTimestamps();
    }
}
