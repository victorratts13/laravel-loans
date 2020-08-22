<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'name',
        'lastname',
        'ip',
        'cpf',
        'rg',
        'address',
        'city',
        'state',
        'cep',
        'perfilFile',
        'docFile1',
        'docFile2',
        'compAddress',
        'phone1',
        'phone2',
        'facebook',
        'instagram',
        'ocupation',
        'reputation',
        'accessType',
        'registerFrom',
        'manegeFrom',
        'email',
        'password',
    ];
}
