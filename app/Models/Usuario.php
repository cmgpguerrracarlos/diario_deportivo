<?php

namespace App\Models;

use Illuminate\Auth\Events\Authenticated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

use Spatie\Permission\Traits\HasRoles;

class Usuario extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'username',
        'nombre',
        'apellido',
        'email',
        'password',
        'fNacimiento'
    ];

    protected $dates = [
        'created_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
