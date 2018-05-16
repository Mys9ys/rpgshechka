@include('layouts.header')
<link href="{{ asset('public/block/battle/style.css') }}" rel="stylesheet">
<script>
    var mobID ='<?=$_REQUEST['id']?>';



</script>
<style>

</style>
<?//dd(Auth::id())?>
<div class="container">
    <div class="battle_wrap" data-mob="<?=$_REQUEST['id']?>">
        <div class="warrior_box warrior1 left">
            <div class="cube_table"></div>
            <div class="panel_box">
                <div class="effect_box"></div>
                <div class="warrior_img">

                </div>
                <div class="bar_block">
                    <div class="mana_bar left">
                        <div class="mana_bar_fill"></div>
                        <div class="mana_bar_text"></div>
                    </div>
                    <div class="HP_bar left">
                        <div class="HP_bar_fill"></div>
                        <div class="HP_bar_text"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="battle_info_box left">
            <div class="battleStart">В бой</div>
        </div>
        <div class="warrior_box warrior2 left">
            <div class="cube_table"></div>
            <div class="panel_box">
                <div class="effect_box"></div>
                <div class="warrior_img">
                </div>
                <div class="bar_block">
                    <div class="mana_bar left">
                        <div class="mana_bar_fill"></div>
                        <div class="mana_bar_text"></div>
                    </div>
                    <div class="HP_bar left">
                        <div class="HP_bar_fill"></div>
                        <div class="HP_bar_text"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div id="finishBattleModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" style="float:right;padding:5px 10px 0 0;z-index:1;position:relative;">&times;</button>
                <div class="modal-header">
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('public/block/battle/script.js') }}"></script>
@include('layouts.footer')