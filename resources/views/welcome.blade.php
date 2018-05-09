@include('layouts.header')
<?//Session::put('HP_really', 50);?>
<?echo Session::get('HP_really');?>

<?//dd(session()->getID())?>

<div class="container">

        <div class="mob">
            <i class="fa fa-info mob_info" aria-hidden="true"></i>
            <div class="mob_rotate">
                <a href="{{ route('battle', ['id' => 1]) }}">
                    <span class="mob_name">моб</span>
                </a>
            </div>
        </div>

</div>
<style>
    .mob{
        position: relative;
        display: inline-block;
        margin-bottom: 9px;
    }
    .mob_rotate{
        display: inline-block;
        width: 50px;
        height: 50px;
        border: 1px solid rgb(40,40,40);
        border-radius: 50% 50% 50% 0;
        padding: 3px;
        transform: rotate(-45deg);
    }
    .mob a{
        cursor: url('/public/image/sword2.png'),pointer;
    }
    .mob_info{
        position: absolute;
        cursor: pointer;
        top: 0px;
        right: -7px;
    }
    .mob_name{
        display: inline-block;
        width: 100%;
        height: 100%;
        transform: rotate(45deg);
    }
</style>

@include('layouts.footer')