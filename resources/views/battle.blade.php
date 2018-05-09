@include('layouts.header')
<script>

    var lvlProps = {
        1:{ XP:0, HP:50, starting:1, speed:1},
        2:{ XP:100, HP:10, starting:1, speed:2},
        3:{ XP:200, HP:20, starting:1, speed:2},
        4:{ XP:400, HP:20, starting:1, speed:2},
        };


</script>
<style>
    .warrior_box{
        display: inline-block;
    }
    .health_box{
        position: relative;
        display: inline-block;
        width: 300px;
        height: 300px;
        border-radius:50% 50% 0 0;
        border: 3px solid rgb(45,45,45);
        overflow: hidden;
    }
    .fill_box{
        position: relative;
        width: 100%;
        height: 100%;
        background: red;
        z-index: 1;
    }
    .box_blind{
        position: absolute;
        top:20px;
        left: 20px;
        border-radius:50% 50% 0 0;
        display: inline-block;
        width: 280px;
        height: 260px;
        background: rgb(255,255,255);
        z-index: 2;
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
</style>

<div class="container">

    <div class="battle_wrap" data-mob="<?=$_REQUEST['id']?>">
        <div class="warrior_box warrior1 left">
            <div class="warrior_img">
                <img src="/public/image/300warrior.jpg" alt="">
            </div>
            <div class="health_box">
                <div class="fill_box"></div>
                <div class="box_blind"></div>
            </div>
        </div>
        <div class="battle_info_box left">-</div>
        <div class="warrior_box warrior2 left">
            <div class="warrior_img">
                <img src="/public/image/300rat.jpg" alt="">
            </div>
        </div>
    </div>


</div>

