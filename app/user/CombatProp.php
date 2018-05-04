<?php

namespace App\user;

use Illuminate\Database\Eloquent\Model;

class CombatProp extends Model
{
    protected $table = 'user_combat_prop';

    protected $fillable = [
        'user', 'health_const', 'health_really', 'energy_const', 'energy_really', 'first_name', 'last_name'
    ];
}
