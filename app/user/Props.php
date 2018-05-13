<?php

namespace App\user;

use Illuminate\Database\Eloquent\Model;

class Props extends Model
{
    protected $table = 'userProps';

    protected $fillable = [
        'user',
        'gold',
        'silver',
        'cuprum',
        'XP',
        'lvl',
        'activism',
    ];
}
