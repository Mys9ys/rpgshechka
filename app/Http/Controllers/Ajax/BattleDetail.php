<?php

namespace App\Http\Controllers\Ajax;

use App\Cube;
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
        $arCube = array();
        foreach ($Cubes as $cube){
            array_push($arCube, Cube::where('id', '=', $cube)->first());
        }
//        $arCube = array();

        $warriors = array(
               1 => array(
                   'lvl' => $userProps['lvl'],
                   'XP' => $userProps['XP'],
                   'HP_start' => $combatProps['health_really'],
                   'HP' => $combatProps['health_really'],
                   'starting' => $combatProps['starting'],
                   'attack' => $combatProps['attack'],
                   'defend' => $combatProps['defend'],
                   'cube' => $arCube,
               )

        );
        return $warriors;
    }
}
