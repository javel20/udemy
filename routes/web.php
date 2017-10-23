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


//clase 4 rutas
Route::get('/', function () {
    return "Hola desde la página de inicio";
});

Route::get('/contacto', function () {
    return "Hola desde la página de contacto";
});


Route::get('/saludos/{nombre}', function ($nombre) {
    return "Saludos $nombre";
})->where('nombre',"[A-Za-z]+");
//paravalidar la variable nombre se utiliza ->where...
// si se le da un nombre a la ruta se puede llamar con route('')

/*
si no quiere que {nombre} sea obligatorio
Route::get('/saludos/{nombre?}', function($nombre= "Invitado") {
    return "Saludos $nombre";
});
*/
