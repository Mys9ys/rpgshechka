@include('layouts.header')

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
    .warrior_box{
        display: inline-block;
    }
    .battle_info_box{
        display: block;
        width: 500px;
        height: 200px;
    }
    .warrior_img{
        display: inline-block;
        width: 300px;
        height: 300px;
        transform: rotate(-45deg);
        border-radius: 50% 50% 50% 0;
        overflow: hidden;
        background: rgb(255,255,255);
        border: 3px solid rgb(45,45,45);
    }
    .warrior_img img{
        transform: rotate(45deg);
    }
    .battleStart{
        display: inline-block;
        width: 70px;
        height: 70px;
        border: 1px solid rgb(40,40,40);
        border-radius: 10px;
        cursor: pointer;
    }
</style>

<div class="container">

    <div class="battle_wrap" data-mob="<?=$_REQUEST['id']?>">
        <div class="warrior_box warrior1 left">
            <div class="warrior_img">
                <img src="/public/image/300warrior.jpgr" alt="">
            </div>
        </div>
        <div class="battle_info_box left">
            <div class="battleStart">В бой</div>
        </div>
        <div class="warrior_box warrior2 left">
            <div class="warrior_img">
                <img src="/public/image/300rat.jpgr" alt="">
            </div>
        </div>
    </div>


</div>

<script src="{{ asset('public/block/battle/script.js') }}"></script>
@include('layouts.footer')