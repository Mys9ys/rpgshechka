<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TreasuryController extends Controller
{
    public function execute(Request $request){

        return view('treasury');
    }
}
