<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BattleDetail extends Controller
{
    public function BattleStart(Request $request){
        $user = \Auth::user()->id;
    }
}
