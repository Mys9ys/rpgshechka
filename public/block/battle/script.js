$(document).ready(function () {
    $('.battleStart').click(function () {
        console.log('battleStart');
        battleStart()
    });
});

function battleStart(){
    warriors ={
        1: {
            HP_start: 50,
            HP: 50,
            cube: [4,4],
            attack: 1,
            defend: 1,
            starting: 1,
        },
        2: {
            HP_start: 10,
            HP: 10,
            cube: [4],
            attack: 0,
            defend: 1,
            starting: 0,
        }
    };

    console.log('warrior1',warriors[1]);
    console.log('warrior2',warriors[2]);
    var first = firstHit(warriors[1]['starting'],warriors[2]['starting']);
    console.log('first',first);
    fight(first);
}
function firstHit(starting1, starting2) {
    if (starting1>starting2){
        return 1;
    } else if(starting1<starting2){
        return 2;
    } else {
        return Math.floor(Math.random()*2)+1;
    }
}

function fight(first) {
    if(warriors[1]['HP']>0 && warriors[2]['HP']>0){
        // $('.warrior'+first).find('.damage_count').delay(800).remove();
        var second = (first == 1) ? 2 : 1;
        var damage = '';
        $.each(warriors[first]['cube'], function (key,item) {
            damage = Number(damage) + cubeHit(item);
            console.log(damage);
        });
        warriors[second]['HP'] = Number(warriors[second]['HP'])-damage;
        $('.warrior'+second).find('.HP_bar_text').text(warriors[second]['HP']);
        var options = {
            duration: 700,
            easing: 'linear',
        };
        $('.warrior'+second).find('.HP_bar_fill').animate({
            width: warriors[second]['HP']/warriors[second]['HP_start']*144
        }, options);
        $('.warrior'+second).find('.effect_box').append('<span class="damage_count">-'+damage+'</span>').slideDown();
        //

         console.log('боец',first,' нанес бойцу',second,' ', damage, ' урона');
         setTimeout(function (args) {
             fight(second)
         },1000);
    } else {
        if(warriors[2]['HP']<=0){
            console.log('боец 2 убит');
        } else {
            console.log('Вы потерпели поражение');
        }

    }
}

function cubeHit(cubeFace) {
    return Math.floor(Math.random()*cubeFace)+1;
}