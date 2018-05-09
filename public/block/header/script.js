$(document).ready(function () {
    health_load();
    energy_load();
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