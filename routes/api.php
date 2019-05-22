<?php

use Illuminate\Http\Request;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\GenerosController;
use App\Http\Controllers\api\ArtistasController;
use App\Http\Controllers\api\CdsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//rotas para acesso a api
Route::post('auth/login','api\AuthController@login');
Route::post('auth/refresh','api\AuthController@refresh');
Route::get('auth/logout','api\AuthController@logout');


Route::get('admin/genero','api\GenerosController@index');
Route::get('admin/genero/{genero}','api\GenerosController@show');
Route::post('admin/genero','api\GenerosController@store');
Route::patch('admin/genero/{genero}','api\GenerosController@update');
Route::delete('admin/genero/{genero}','api\GenerosController@delete');



Route::get('admin/artistas','api\ArtistasController@index');
Route::get('admin/artistas/{artista}','api\ArtistasController@show');
Route::post('admin/artistas','api\ArtistasController@store');
Route::patch('admin/artistas/{artista}','api\ArtistasController@update');
Route::delete('admin/artistas/{artista}','api\ArtistasController@delete');

Route::get('admin/cds','api\CdsController@index');
Route::get('admin/cds/{cd}','api\CdsController@show');
Route::post('admin/cds','api\CdsController@store');
Route::patch('admin/cds/{cd}','api\CdsController@update');
Route::delete('admin/cds/{cd}','api\CdsController@delete');
Route::get('admin/cds/genero/{id}','api\CdsController@pesquisaGenero');
Route::get('admin/cds/artista/{id}','api\CdsController@pesquisaArtista');
Route::get('admin/cds/busca/ultimo','api\CdsController@pesquisaUltimo');
Route::get('admin/cds/delete/cdsSemArtistas','api\CdsController@artistaRemove');
Route::get('admin/cds/delete/cdsSemGeneros','api\CdsController@generoRemove');





Route::get('admin/cds/allGeneros/{id}','api\CdsController@allGeneros');
Route::get('admin/cds/allArtistas/{id}','api\CdsController@allArtistas');
Route::get('admin/cds/adicionarArtista/{idC}/{idA}','api\CdsController@incluirArtista');
Route::get('admin/cds/adicionarGenero/{idC}/{idG}','api\CdsController@incluirGenero');
Route::get('admin/cds/removeArtista/{idC}/{idA}','api\CdsController@removeArtista');
Route::get('admin/cds/removeGenero/{idC}/{idG}','api\CdsController@removeGenero');


Route::group(['middleware' => 'jwt.auth','namespace'=> 'api\\'], function(){

    Route::get('auth/me', 'AuthController@me');
});