<?php

namespace App\Http\Controllers\Ajax;

use App\user\Props;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Session;

class HP_fill extends Controller
{
    public function HP_fill(Request $request)
    {
        session()->put('HP_really', $request->HP_text);
        return json_encode(session()->all());
    }
    public function HP_full(){
        $health = Props::where('user', '=',\Auth::user()->id)->first();
        $health->health_really=$health->health_const;
        $health->save();
        session()->forget('HP_really');
    }
}
