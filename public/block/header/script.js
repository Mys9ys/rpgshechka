$(document).ready(function () {
    health_load();
    energy_load();
    XP_load()
    console.log('lvlProps', lvlProps[8]['XP']);
});
// функция восстановления жизни
function health_load(){
    var HP_really = $('.health_bar').data('health_really');
    var HP_const = $('.health_bar').data('health_const');
    // sessionStorage['health_really'] = HP_really;
    $('.health_bar').append('<div class="user_bar_fill"></div><span class="user_bar_fill_text">'+HP_really+'</span>');
    $('.health_bar').find('.user_bar_fill').css('background', 'rgb(255, 78, 51)');
    var options = {
        duration: 400,
        easing: 'linear'
    };
    if(HP_really==HP_const){
        $('.health_bar').find('.user_bar_fill').animate({
            width: 100
        }, options);
    } else {
        var HP_width = (HP_const-HP_really)/HP_const*100;
        var width = 100-HP_width;
        var width_absolute = 100/HP_const;
        $('.health_bar').find('.user_bar_fill').animate({
            width: width
        }, options);
        var health_fillable = setInterval(function(){
            if(width<100){
                $('.health_bar').find('.user_bar_fill').animate({
                    width: width+=2
                }, options);
                var HP_text = Math.floor(width/width_absolute);
                $('.health_bar').find('.user_bar_fill_text').text(HP_text);
                $.post(
                    '/Ajax/HP_fill',
                    {HP_text:HP_text}
                );
            } else {
                console.log('stop');
                clearInterval(health_fillable);
                $.post(
                    '/HP_full',
                    {HP_text:HP_text}
                );
            }
        }, 1000);
    }
}
// функция вывода доступной энергии
function energy_load() {
    var energy_const = $('.energy_bar').data('energy_const');
    var energy_really = $('.energy_bar').data('energy_really');
    $('.energy_bar').append('<div class="user_bar_fill"></div><span class="user_bar_fill_text">'+energy_really+'</span>');
    $('.energy_bar').find('.user_bar_fill').css('background', 'rgb(156, 194, 24)');
    var options = {
        duration: 400,
        easing: 'linear'
    };
    if(energy_const==energy_really){
        $('.energy_bar').find('.user_bar_fill').animate({
            width: 100
        }, options);
    } else if (energy_really>energy_const){
        $('.energy_bar').find('.user_bar_fill').animate({
            width: 100
        }, options);
    } else {
        $('.energy_bar').find('.user_bar_fill').animate({
            width: (energy_really)/energy_const*100
        }, options);
    }
}

function XP_load() {
    var lvl_really = $('.lvl_count').text();
    var XP_really = $('.XP_bar').data('xp_really');
    console.log('lvl_really', lvl_really);
    console.log('XP_really', XP_really);
    var needXP = lvlProps[Number(lvl_really)+1]['XP']
        $('.XP_bar').append('<div class="user_bar_fill"></div><span class="user_bar_fill_text">'+XP_really+'</span>');
    $('.XP_bar').find('.user_bar_fill').css('background', 'rgb(34,164,245)');
    var options = {
        duration: 400,
        easing: 'linear'
    };
    $('.XP_bar').find('.user_bar_fill').animate({
        width: (XP_really)/needXP*100
    }, options);
    $('.XP_bar').attr('title', 'up '+(Number(needXP)-Number(XP_really)));
}

var lvlProps = {
    1:{ XP:0, HP:50, starting:1, speed:1, cubePoint: 0},
    2:{ XP:250, HP:10, starting:1, speed:2, cubePoint: 1, silver: 50, energy: 10},
    3:{ XP:500, HP:10, starting:1, speed:2, cubePoint: 1, silver: 50, energy: 10},
    4:{ XP:1000, HP:10, starting:1, speed:2, cubePoint: 1, silver: 50, energy: 10},
    5:{ XP:2000, HP:20, starting:1, speed:2, cubePoint: 1, silver: 50, energy: 10, mana: 50},
    6:{ XP:4000, HP:20, starting:1, speed:2, cubePoint: 1, silver: 50, energy: 10, mana: 10},
    7:{ XP:8000, HP:20, starting:1, speed:2, cubePoint: 1, silver: 50, energy: 10, mana: 10},
    8:{ XP:16000, HP:20, starting:1, speed:2, cubePoint: 1, silver: 50, energy: 10, mana: 10},
};