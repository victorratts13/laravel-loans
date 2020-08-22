<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class management extends Model
{
    protected $table = 'managements';
    protected $fillable = [
        'name', 'lastname', 'email', 'phone', 'cpf', 'address', 'state', 'city', 'cep', 'accessType', 'userId', 'banca', 'place', 'returns', 'total', 'clients', 'reputation'
    ];
}
