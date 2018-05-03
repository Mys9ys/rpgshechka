<?php

namespace App\user;

use Illuminate\Database\Eloquent\Model;

class Prop extends Model
{
    protected $table = 'user_prop';

    protected $fillable = [
        'user', 'money_silver', 'money_gold', 'first_name', 'last_name'
    ];
}
