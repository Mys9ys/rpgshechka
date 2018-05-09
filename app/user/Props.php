<?php

namespace App\user;

use Illuminate\Database\Eloquent\Model;

class Props extends Model
{
    protected $table = 'userProps';

    protected $fillable = [
        'user', 'health_const', 'health_really', 'energy_const', 'energy_really', 'gold', 'silver', 'cuprum', 'first_name', 'last_name'
    ];
}
