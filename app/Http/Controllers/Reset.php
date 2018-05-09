<?php

namespace App\Http\Controllers;

use App\User;
use App\user\Props;
use App\user\CombatProps;
use Illuminate\Http\Request;

class Reset extends Controller
{
    public function reset(Request $request){
        $res = new User();
        $res->truncate();
        $res = new CombatProps();
        $res->truncate();
        $res = new Props();
        $res->truncate();
        session()->flush();
    }
}
