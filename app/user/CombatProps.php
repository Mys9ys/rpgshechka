<?php

namespace App\user;

use Illuminate\Database\Eloquent\Model;

class CombatProps extends Model
{
    protected $table = 'userCombatProps';

    protected $fillable = [
        'user',
        'health_const',
        'health_really',
        'energy_const',
        'energy_really',
        'cube'
    ];
}
