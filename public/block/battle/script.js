$(document).ready(function () {

    $.post(
        '/warriorProps',
    {mobID:$('.battle_wrap').data('mob')},
    function (result) {
        console.log(result);
        $('.battleStart').click(function () {
            battleStart(result)
        });
    });



});

function battleStart(result){
    // console.log('result', result);
    warriors = result;
    console.log('warriors', warriors);
    ModalClear();
    warriors ={
        1: {
            HP_start: 50,
            HP: 50,
            lvl: 1,
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
    loot = {
        money: {
            cuprum: {
                chance: 100,
                min: 1,
                max: 10,
            },
        },
        receipt: {
            potion: {
                chance: 5,
                min: 1,
                max: 1,
            }
        },
        provision: {
            wheat: {
                chance: 50,
                min: 1,
                max: 3,
            },
            corn: {
                chance: 50,
                min: 1,
                max: 3,
            }
        },
        resources: {
            patSkin: {
                chance: 10,
                min: 1,
                max: 1,
            }
        }
    };

    console.log('warrior1',warriors[1]);
    console.log('warrior2',warriors[2]);
    var first = firstHit(warriors[1]['starting'],warriors[2]['starting']);

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
        //
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
        $('.warrior'+second).find('.effect_box').append('<span class="damage_count">-'+damage+'</span>');
        $('.warrior'+first).find('.damage_count').animate({
            top:-250
        },{
            duration: 300,
            easing: 'linear',
            complete: function () {
                $('.warrior'+first).find('.damage_count').remove();
            }
        });

        //

         console.log('боец',first,' нанес бойцу',second,' ', damage, ' урона');
         setTimeout(function (args) {
             fight(second)
         },1000);
    } else {
        if(warriors[2]['HP']<=0){
            finish_message = 'боец 2 убит';


            $('#finishBattleModal').find('.modal-body').append(lootCalculate(loot));
        } else {
            finish_message = 'Вы потерпели поражение';
        }
        $('#finishBattleModal').find('.modal-header').append('<span>'+finish_message+'</span>');
        $('#finishBattleModal').modal('show');
    }
}

function cubeHit(cubeFace) {
    return Math.floor(Math.random()*cubeFace)+1;
}

function lootCalculate(loot) {
    arLoot = {};
    var content = '';
    console.log('loot', loot);
    $.each(loot, function (section,value) {
        console.log('loot', value);
        $.each(value, function (name, itemPops) {
            console.log('lootItem', itemPops['chance']);
            if(lootChance()<=itemPops['chance']){
                var count = Math.floor(Math.random()*itemPops['max'])+itemPops['min'];
                arLoot[name] = count;
                console.log('name: ', name, 'count: ', count, 'arLoot[name]', arLoot[name]);
                content = content + lootView(name,'/public/image/loot/wheat.jpg', count)
            }
        });
    });
    console.log('arLoot', arLoot);
    return content;
}

function lootChance() {
    return Math.floor(Math.random()*100)+1;
}

function lootView(name,img, count){
    return '<div class="loot_item">'+
                '<div class="loot_img">'+
                    '<img src="'+img+'" alt="" title="'+name+'">'+
                '</div>'+
                '<div class="loot_count">'+count+'</div>'+
            '</div>';
}

function ModalClear(){
    $('#finishBattleModal').find('.modal-header').html('');
    $('#finishBattleModal').find('.modal-body').html('');
    $('#finishBattleModal').find('.modal-footer').html('');
}