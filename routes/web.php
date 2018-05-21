<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// логин через соцсети
Route::post('ulogin', 'UloginController@login');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/battle', 'BattleController@execute')->name('battle');
Route::get('/treasury', 'TreasuryController@execute')->name('treasury');

Route::post('/warriorProps', 'Ajax\BattleDetail@warriorProps'); //запрос параметров сражающихся
Route::post('/Ajax/HP_fill', 'Ajax\HP_fill@HP_fill'); // востановление жизни
Route::post('/HP_full', 'Ajax\HP_fill@HP_full'); //восстановление жизни полностью

Route::post('/reset', 'Reset@reset'); // сброс всех данных
