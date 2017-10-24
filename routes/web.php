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

//class 8
Route::post('contacto','PagesController@mensajes');

//clase 7 controllers
Route::get('/', 'PagesController@home')->name('home');//->middleware('example');
Route::get('/contacto', 'PagesController@contacto')->name('contacto');
Route::get('/saludos/{nombre?}', 'PagesController@saludo')->name('saludo')->where('nombre',"[A-Za-z]+");


/*
//clase 5 retornar vistas a la ruta
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

Route::get('/saludos/{nombre?}', function ($nombre="Invitado"){
    
    $consolas=[
        
        "play",
        "Xbox",
        "Wii"
        
    ];
    
    return view('saludo',['nombre'=> $nombre,'consolas'=>$consolas]);
    //return view('saludo')->with(['nombre'=>$nombre]);
    //return view('saludo',compact('nombre'));
    //compact devolver un array asociativo con el nombre que le pasemos como llave
    // y el valor de una variable existente del mismo nombre

})->where('nombre',"[A-Za-z]+")->name('saludo');

*/


/*
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


si no quiere que {nombre} sea obligatorio
Route::get('/saludos/{nombre?}', function($nombre= "Invitado") {
    return "Saludos $nombre";
});
*/
