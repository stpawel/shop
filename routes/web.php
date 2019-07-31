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

Route::get('category/', 'CategoryBackendController@index');
Route::get('category/add', 'CategoryBackendController@add');
Route::post('category/create', 'CategoryBackendController@create');
Route::get('category/edit/{id}', 'CategoryBackendController@edit');
Route::post('category/update', 'CategoryBackendController@update');
Route::get('category/delete/{id}', 'CategoryBackendController@delete');

Route::get('book/', 'BookBackendController@index');
Route::get('book/add', 'BookBackendController@add');
Route::post('book/create', 'BookBackendController@create');
Route::get('book/edit/{id}', 'BookBackendController@edit');
Route::post('book/update', 'BookBackendController@update');
Route::get('book/delete/{id}', 'BookBackendController@delete');
Route::get('book/delete/{id}/delfile/{idfile}', 'BookBackendController@delfile');

Route::get('ksiazki', 'BookFrontedController@index');
Route::get('ksiazki/{href}/{id}', 'BookFrontedController@showbook');
Route::get('ksiazki/{href}', 'BookFrontedController@show');

Route::get('koszyk/', 'BasketFrontedController@index');
Route::post('koszyk/dodaj', 'BasketFrontedController@add');
Route::get('koszyk/usun/{id}', 'BasketFrontedController@delete');

Route::get('konto/rejestracja', 'UserFrontedController@index');
Route::post('konto/zarejestruj', 'UserFrontedController@create');
Route::get('profil', 'UserFrontedController@edit');
Route::post('profil/aktualizacja', 'UserFrontedController@update');
Route::get('haslo', 'UserFrontedController@newpassword');
Route::post('haslo/aktualizacja', 'UserFrontedController@updatepassword');

Route::post('zamowienia/dodaj', 'OrderFrontedController@create');
Route::get('zamowienia/', 'OrderFrontedController@index');
Route::get('zamowienia/szczegoly/{id}', 'OrderFrontedController@show');

Route::get('order', 'OrderBackendController@index');
Route::get('order/detail/{id}', 'OrderBackendController@show');
Route::get('order/sent', 'OrderBackendController@sent');
Route::get('order/update/{id}', 'OrderBackendController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
