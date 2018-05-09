<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class BattleController extends Controller
{
    public function execute(Request $request){

        return view('battle');
    }
}
