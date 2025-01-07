<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use HasFactory, Notifiable;
 

    protected $fillable = [
        'nombres',
        'apellidos',
        'cedula',
        'nacionalidad',
        'email',
        'password',
        'fecha_nacimiento',
        'facebook',
        'instagram',
        'tiktok',
        'x',
        'descripcion',
        'pregunta_secreta',
        'respuesta_secreta',

    ];

    protected $hidden = [
        'password',
        'remember_token',
        'respuesta_secreta',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRoleAttribute()
{
    return $this->getRoleNames()->first();

}
}
