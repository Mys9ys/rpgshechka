$(document).ready(function () {
    health_load();
});
function health_load(){
    var HP_really = $('.health_bar').data('health_really');
    var HP_const = $('.health_bar').data('health_const');

    console.log('HP_really',HP_really);
    console.log('HP_const',HP_const);
}