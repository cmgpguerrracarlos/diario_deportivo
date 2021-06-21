<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    protected $fillable = [
        'administrador_id',
    ];

    protected $table = 'administrador'; //con esto laravel deja de ir a buscar administradors a la base de datos y va buscar a administrador 
}
