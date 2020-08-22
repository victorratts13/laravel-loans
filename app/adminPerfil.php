<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class adminPerfil extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'name', 'lastname', 'email', 'cpf', 'rg', 'address', 'state', 'city', 'cep'
    ];
}
