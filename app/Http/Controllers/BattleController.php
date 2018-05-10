<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class BattleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function execute(Request $request){

        return view('battle');
    }
}
