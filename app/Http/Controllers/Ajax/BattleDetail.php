<?php

namespace App\Http\Controllers\Ajax;

use App\Cube;
use App\Mobs;
use App\Mobs_bibl;
use App\user\CombatProps;
use App\user\Props;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BattleDetail extends Controller
{
    public function warriorProps(Request $request){
        $userProps = Props::where('user', '=', \Auth::id())->first();
        $combatProps = CombatProps::where('user', '=', \Auth::id())->first();
        $Cubes = explode(";", $combatProps['cube']);
        $arCubeUser = array();
        foreach ($Cubes as $cube){
            array_push($arCubeUser, Cube::where('id', '=', $cube)->first());
        }
        $mobs = Mobs::where('id', '=', $request->mobID)->first();
        $mobsProp = Mobs_bibl::where('id', '=', $mobs['mobBibl'])->first();
        $mobCubes = explode(";", $mobsProp['cube']);
        $arCubeMob = array();
        foreach ($mobCubes as $cube){
            array_push($arCubeMob, Cube::where('id', '=', $cube)->first());
        }
        $mobsProp['HP_start'] = $mobsProp['HP'];
        $mobsProp['cube'] = $arCubeMob;
        $warriors = array(
               1 => array(
                   'name' => \Auth::user()->nik,
                   'lvl' => $userProps['lvl'],
                   'XP' => $userProps['XP'],
                   'HP_start' => $combatProps['health_const'],
                   'HP' => $combatProps['health_really'],
                   'starting' => $combatProps['starting'],
                   'attack' => $combatProps['attack'],
                   'defend' => $combatProps['defend'],
                   'cube' => $arCubeUser,
                   'avatar' => '/public/image/300warrior.jpg'
               ),
               2 => $mobsProp,


        );
        return $warriors;
    }
}
