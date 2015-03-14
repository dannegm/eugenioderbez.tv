<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'index', 'uses' => 'IndexController@index'));

Route::get('home', array('as' => 'index', 'uses' => 'IndexController@index'));

Route::get('carnales', array('as' => 'carnales', 'uses' => 'IndexController@carnales'));

Route::get('derbez', array('as' => 'derbez', 'uses' => 'IndexController@derbez'));

Route::get('legales', array('as' => 'legales', 'uses' => 'IndexController@legales'));

Route::get('meme/{id}', array('as' => 'meme', 'uses' => 'IndexController@meme'));

Route::get('memeteca', array('as' => 'memeteca', 'uses' => 'IndexController@memeteca'));

Route::get('memetecapages', array('as' => 'memetecapages', 'uses' => 'IndexController@memetecaPages'));

Route::get('nota/{id}', array('as' => 'nota', 'uses' => 'IndexController@nota'));

Route::get('preguntame', array('as' => 'preguntame', 'uses' => 'IndexController@preguntame'));

Route::get('video/{id}', array('as' => 'video', 'uses' => 'IndexController@video'));

Route::get('videos/{id}', array('as' => 'videos', 'uses' => 'IndexController@categoryVideos'));

/*
	Panel de administración
*/

Route::get('appanel', array('as' => 'appanel', 'uses'=>'AppController@login'));

Route::post('appanel/dologin', 'AppController@entrar');

Route::group(array('before' => 'auth', 'prefix' => 'appanel'), function(){

	Route::get('logout', array('as' => 'logout', 'uses' => 'AppController@salir'));

	Route::get('index', array('as' => 'index', 'uses' => 'AppController@index'));

//secciones

	Route::get('video', array('as' => 'appanel.video.index', 'uses' => 'VideoController@index'));
	Route::get('video/create', array('as' => 'appanel.video.create', 'uses' => 'VideoController@create'));
	Route::post('video/store', array('as' => 'appanel.video.store', 'uses' => 'VideoController@store'));
	Route::get('video/{id}/edit', array('as' => 'appanel.video.edit', 'uses' => 'VideoController@edit'));
	Route::put('video/{id}/update', array('as' => 'appanel.video.update', 'uses' => 'VideoController@update'));
	Route::get('video/{id}/destroy', array('as' => 'appanel.video.destroy', 'uses' => 'VideoController@destroy'));
	Route::post('video/destacados', array('as' => 'appanel.video.destacados', 'uses' => 'VideoController@destacados'));

	Route::get('nota', array('as' => 'appanel.nota.index', 'uses' => 'NotaController@index'));
	Route::get('nota/create', array('as' => 'appanel.nota.create', 'uses' => 'NotaController@create'));
	Route::post('nota/store', array('as' => 'appanel.nota.store', 'uses' => 'NotaController@store'));
	Route::get('nota/{id}/edit', array('as' => 'appanel.nota.edit', 'uses' => 'NotaController@edit'));
	Route::put('nota/{id}/update', array('as' => 'appanel.nota.update', 'uses' => 'NotaController@update'));
	Route::get('nota/{id}/destroy', array('as' => 'appanel.nota.destroy', 'uses' => 'NotaController@destroy'));
	Route::post('nota/destacados', array('as' => 'appanel.nota.destacados', 'uses' => 'NotaController@destacados'));
	Route::post('nota/destacadosg', array('as' => 'appanel.nota.destacadosg', 'uses' => 'NotaController@destacadosg'));

	Route::get('user', array('as' => 'appanel.user.index', 'uses' => 'UserController@index'));
	Route::get('user/create', array('as' => 'appanel.user.create', 'uses' => 'UserController@create'));
	Route::post('user/store', array('as' => 'appanel.user.store', 'uses' => 'UserController@store'));
	Route::get('user/{id}/edit', array('as' => 'appanel.user.edit', 'uses' => 'UserController@edit'));
	Route::put('user/{id}/update', array('as' => 'appanel.user.update', 'uses' => 'UserController@update'));
	Route::get('user/{id}/destroy', array('as' => 'appanel.user.destroy', 'uses' => 'UserController@destroy'));

	Route::get('picture', array('as' => 'appanel.picture.index', 'uses' => 'PictureController@index'));
	Route::get('picture/create', array('as' => 'appanel.picture.create', 'uses' => 'PictureController@create'));
	Route::post('picture/store', array('as' => 'appanel.picture.store', 'uses' => 'PictureController@store'));
	Route::get('picture/{id}/edit', array('as' => 'appanel.picture.edit', 'uses' => 'PictureController@edit'));
	Route::put('picture/{id}/update', array('as' => 'appanel.picture.update', 'uses' => 'PictureController@update'));
	Route::post('picture/{id}/destroy', array('as' => 'appanel.picture.destroy', 'uses' => 'PictureController@destroy'));

	Route::get('meme', array('as' => 'appanel.meme.index', 'uses' => 'MemeController@index'));
	Route::get('meme/create', array('as' => 'appanel.meme.create', 'uses' => 'MemeController@create'));
	Route::post('meme/store', array('as' => 'appanel.meme.store', 'uses' => 'MemeController@store'));
	Route::get('meme/{id}/edit', array('as' => 'appanel.meme.edit', 'uses' => 'MemeController@edit'));
	Route::put('meme/{id}/update', array('as' => 'appanel.meme.update', 'uses' => 'MemeController@update'));
	Route::get('meme/{id}/destroy', array('as' => 'appanel.meme.destroy', 'uses' => 'MemeController@destroy'));

	Route::get('category', array('as' => 'appanel.category.index', 'uses' => 'CategoryController@index'));
	Route::get('category/create', array('as' => 'appanel.category.create', 'uses' => 'CategoryController@create'));
	Route::post('category/store', array('as' => 'appanel.category.store', 'uses' => 'CategoryController@store'));
	Route::get('category/{id}/edit', array('as' => 'appanel.category.edit', 'uses' => 'CategoryController@edit'));
	Route::put('category/{id}/update', array('as' => 'appanel.category.update', 'uses' => 'CategoryController@update'));
	Route::get('category/{id}/destroy', array('as' => 'appanel.category.destroy', 'uses' => 'CategoryController@destroy'));

	Route::get('client', array('as' => 'appanel.client.index', 'uses' => 'ClientController@index'));
	Route::get('client/create', array('as' => 'appanel.client.create', 'uses' => 'ClientController@create'));
	Route::post('client/store', array('as' => 'appanel.client.store', 'uses' => 'ClientController@store'));
	Route::get('client/{id}/edit', array('as' => 'appanel.client.edit', 'uses' => 'ClientController@edit'));
	Route::put('client/{id}/update', array('as' => 'appanel.client.update', 'uses' => 'ClientController@update'));
	Route::get('client/{id}/destroy', array('as' => 'appanel.client.destroy', 'uses' => 'ClientController@destroy'));

	Route::get('add', array('as' => 'appanel.add.index', 'uses' => 'AddController@index'));
	Route::get('add/create', array('as' => 'appanel.add.create', 'uses' => 'AddController@create'));
	Route::post('add/store', array('as' => 'appanel.add.store', 'uses' => 'AddController@store'));
	Route::get('add/{id}/edit', array('as' => 'appanel.add.edit', 'uses' => 'AddController@edit'));
	Route::put('add/{id}/update', array('as' => 'appanel.add.update', 'uses' => 'AddController@update'));
	Route::get('add/{id}/destroy', array('as' => 'appanel.add.destroy', 'uses' => 'AddController@destroy'));


//uploads

	Route::post('upload', array('as'=>'upload', 'uses'=>'ImageController@upload'));

	Route::get('upload/index', array('uses'=>'ImageController@index'));

	Route::get('picsjson', array('as'=>'picsJSON', 'uses'=>'ImageController@picsJSON'));

});

App::error(function(Exception $exception)
{
    return Redirect::to(URL::to('/'));
});

