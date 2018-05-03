<?php

namespace App\Http\Controllers;

use App\User;
use App\user\CombatProp;
use App\user\Prop;
use Illuminate\Http\Request;

class Reset extends Controller
{
    public function reset(Request $request){
        $res = new User();
        $res->truncate();
        $res = new Prop();
        $res->truncate();
        $res = new CombatProp();
        $res->truncate();
    }
}
