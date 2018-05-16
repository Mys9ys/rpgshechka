<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Рпгшка</title>

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('public/block/header/style.css') }}" rel="stylesheet">
{{--<link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">--}}

<!-- Fonts -->
    {{--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}
    {{--<link href="http://allfont.ru/allfont.css?fonts=cyrillicold" rel="stylesheet" type="text/css"/>--}}
    <link href="{{ asset('public/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('public/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('public/js/jquery.cookie.js') }}"></script>
    <script src="{{ asset('public/js/main.js') }}"></script>
    <script src="{{ asset('public/block/header/script.js') }}"></script>
</head>

<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->

            <!--            --><?//dd(Auth::guest())?>
            <ul class="nav navbar-left">
                @if(Auth::guest())
                    <li class="dropdown">
                        <div class="login_social">
                            <img src="/public/image/door_user.png" alt="">
                            <span>Добро пожаловать!</span>
                        </div>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle user_header left" data-toggle="dropdown" role="button"
                           aria-expanded="false">
                            <div class="user_avatar left"><img src="{{ Auth::user()->avatar }}" alt=""></div>
                        </a>
                        <div class="user_info left">
                            <?$CombatProps = \App\user\CombatProps::where('user', '=', Auth::id())->first();?>
                            <?$UserProps = \App\user\Props::where('user', '=', Auth::id())->first();?>
                            <div class="user_nik ">{{ Auth::user()->nik }}</div>
                            <div class="user_info_contain">
                                <div class="lvl_box left">
                                    <div class="lvl_title">lvl</div>
                                    <div class="lvl_count"><?=$UserProps['lvl']?></div>
                                </div>
                                <div class="user_bars left">
                                    <div class="user_bar_wrap">
                                        <i class="fa fa-heart fa-icon left" aria-hidden="true"></i>
                                        <?if(!empty(Session::get('HP_really')) && Session::get('HP_really')>$CombatProps['health_really'])
                                            {$CombatProps['health_really']=Session::get('HP_really');}?>
                                        <div class="health_bar user_bar left"
                                             data-health_const="<?=$CombatProps['health_const']?>"
                                             data-health_really="<?=$CombatProps['health_really']?>"></div>
                                    </div>
                                    <div class="user_bar_wrap">
                                        <i class="fa fa-bolt fa-icon left" aria-hidden="true"></i>
                                        <div class="energy_bar user_bar left"
                                             data-energy_const="<?=$CombatProps['energy_const']?>"
                                            data-energy_really="<?=$CombatProps['energy_really']?>"></div>
                                    </div>
                                </div>
                                <div class="user_bars left">
                                    <div class="user_bar_wrap">
                                        <span class="left fa-icon XP_icon">xp</span>
                                        <div class="XP_bar user_bar left"
                                             {{--data-XP_lvlUP="<?=$CombatProps['energy_really']?>"--}}
                                             data-XP_really="<?=$UserProps['XP']?>"></div>

                                    </div>
                                    <div class="user_bar_wrap">
                                        <i class="fa fa-star fa-icon left" aria-hidden="true"></i>
                                        <div class="activism_bar user_bar left"

                                             data-activism_really="<?=$CombatProps['energy_really']?>"></div>
                                    </div>
                                </div>
                                <div class="user_money left">
                                    <div class="user_money_wrap">
                                        <div class="coin_icon coin_gold left"></div>
                                        <div class="money_gold money_box left"><?=$UserProps['gold']?></div>
                                    </div>
                                    <div class="user_money_wrap">
                                        <div class="coin_icon coin_silver left"></div>
                                        <div class="money_silver money_box left"><?=$UserProps['silver']?></div>
                                    </div>
                                    <div class="user_money_wrap">
                                        <div class="coin_icon coin_cuprum left"></div>
                                        <div class="money_cuprum money_box left"><?=$UserProps['cuprum']?></div>
                                    </div>

                                </div>


                            </div>
                        </div>


                        <ul class="dropdown-menu" role="menu">
                            <li>
                                {{--<a href="{{ route('message') }}" class="messages">--}}
                                {{--Сообщения--}}
                                {{--</a>--}}
                            </li>
                            <li>
                                {{--<a href="{{ route('profile') }}">--}}
                                {{--Настройки--}}
                                {{--</a>--}}
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>

                @endif
            </ul>

        </div>


    </div>
</nav>


@include('auth.social')