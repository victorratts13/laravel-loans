<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loan extends Model
{
    protected $table = 'loans';
    protected $fillable = [
        'name','cpf', 'userId', 'colabId', 'colabName', 'colabAccess', 'uniqHash', 'codeHash', 'value', 'parcels', 'period', 'jurs', 'delayAcres', 'uteis', 'status'
    ];
}
