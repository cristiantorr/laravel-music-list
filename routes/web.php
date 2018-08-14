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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Registros y login

Route::get('/registrarse', 'Auth\RegisterController@showRegistrationForm')->name('auth.showregister');
Route::post('/registro','Auth\RegisterController@create')->name('auth.registeruser');

Route::get('/iniciar-sesion', 'Auth\LoginController@showLoginForm')->name('auth.showlogin');
Route::post('/login', 'Auth\LoginController@login')->name('auth.login');

// Route::post('/iniciar-sesion', 'Auth\LoginController@authenticateActivate')->name('auth.authenticateActivate');
// Route::get('/olvidar-contraseña', 'Auth\ForgotPasswordController')->name('olvidar-contraseña');
// Route::post('/reiniciar-contraseña', 'Auth\ResetPasswordController')->name('reiniciar-contraseña');

//listas de musica
Route::group(['prefix' => 'listas'], function() {
  Route::get('/', 'MusicListController@index')->name('musiclist.home');
  Route::get('/crear', 'MusicListController@create')->name('musiclist.showcreate')->middleware('auth');
  Route::get('/editar/{id}', 'MusicListController@edit')->name('musiclist.showedit')->middleware('auth');
  Route::get('/delete/{id}','MusicListController@destroy')->name('musiclist.delete')->middleware('auth');
  Route::get('/{id}', 'MusicListController@like')->name('musiclist.like');
  Route::get('/comentario/{id}', 'MusicListController@musiclistComments')->name('musiclist.comment');
  Route::post('/create', 'MusicListController@store')->name('musiclist.create')->middleware('auth');
  Route::post('/edit/{id}','MusicListController@update')->name('musiclist.update')->middleware('auth');
});

Route::group(['prefix' => 'canciones'], function() {
  Route::get('/{id}', 'SongsController@index')->name('songs.home');
  Route::get('/crear/{id}','SongsController@create')->name('songs.showcreate');
  Route::get('/editar/{id}','SongsController@edit')->name('songs.showedit');
  Route::post('/create/{id}','SongsController@store')->name('songs.create');
  Route::post('/edit/{id}','SongsController@update')->name('songs.update');
  Route::get('/delete/{id}','SongsController@destroy')->name('songs.delete');
});
