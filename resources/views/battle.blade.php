@include('layouts.header')
<link href="{{ asset('public/block/battle/style.css') }}" rel="stylesheet">
<script>
    var mobID ='<?=$_REQUEST['id']?>';
    var lvlProps = {
        1:{ XP:0, HP:50, starting:1, speed:1, cubePoint: 0},
        2:{ XP:250, HP:10, starting:1, speed:2, cubePoint: 1, silver: 50, energy: 10},
        3:{ XP:500, HP:10, starting:1, speed:2, cubePoint: 1, silver: 50, energy: 10},
        4:{ XP:1000, HP:10, starting:1, speed:2, cubePoint: 1, silver: 50, energy: 10},
        5:{ XP:2000, HP:20, starting:1, speed:2, cubePoint: 1, silver: 50, energy: 10},
        6:{ XP:4000, HP:20, starting:1, speed:2, cubePoint: 1, silver: 50, energy: 10},
        7:{ XP:8000, HP:20, starting:1, speed:2, cubePoint: 1, silver: 50, energy: 10},
        8:{ XP:16000, HP:20, starting:1, speed:2, cubePoint: 1, silver: 50, energy: 10},
        };
    console.log('lvlProps', lvlProps[8]['XP']);

</script>
<style>

</style>

<div class="container">

    <div class="battle_wrap" data-mob="<?=$_REQUEST['id']?>">
        <div class="warrior_box warrior1 left">
            <div class="effect_box"></div>
            <div class="warrior_img">
                <img src="/public/image/300warrior.jpgr" alt="">
            </div>
            <div class="bar_block">
                <div class="mana_bar left">
                    <div class="mana_bar_fill"></div>
                    <div class="mana_bar_text">50</div>
                </div>
                <div class="HP_bar left">
                    <div class="HP_bar_fill"></div>
                    <div class="HP_bar_text">50</div>
                </div>
            </div>
        </div>
        <div class="battle_info_box left">
            <div class="battleStart">В бой</div>
        </div>
        <div class="warrior_box warrior2 left">
            <div class="effect_box"></div>
            <div class="warrior_img">
                <img src="/public/image/300rat.jpgr" alt="">
            </div>
            <div class="bar_block">
                <div class="mana_bar left">
                    <div class="mana_bar_fill"></div>
                    <div class="mana_bar_text">50</div>
                </div>
                <div class="HP_bar left">
                    <div class="HP_bar_fill"></div>
                    <div class="HP_bar_text">50</div>
                </div>
            </div>
        </div>
    </div>


</div>

<script src="{{ asset('public/block/battle/script.js') }}"></script>
@include('layouts.footer')