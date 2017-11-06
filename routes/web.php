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

/*
//class 31 - mostrar todas las consultas que se ejecutan en la pagina
DB::listen(function($query){

        echo "<pre>{$query->sql}</pre>";
        //echo "<pre>{$query->time}</pre>";

});
*/

//class 17
Route::resource('mensajes','MessagesController');
Route::resource('usuarios','UsersController');

/*
class 21
App\User::create([
    'name' => 'javier',
    'email'=> 'javier@gmail.com',
    'password' => bcrypt('javier'),
    'role' => 'admin'
]);
*/

//class 15
/*Route::get('mensajes/create', 'MessagesController@create')->name('messages.create');
Route::get('mensajes', 'MessagesController@index')->name('messages.index');
Route::post('mensajes', 'MessagesController@store')->name('messages.store');

Route::get('mensajes/{id}', 'MessagesController@show')->name('messages.show');
Route::get('mensajes/{id}/edit', 'MessagesController@edit')->name('messages.edit');
Route::put('mensajes/{id}', 'MessagesController@update')->name('messages.update');
Route::delete('mensajes/{id}', 'MessagesController@destroy')->name('messages.destroy');
*/

//class 8
//Route::post('contacto','PagesController@mensajes');

//clase 7 controllers
Route::get('/', 'PagesController@home')->name('home');//->middleware('example');
//Route::get('/contacto', 'PagesController@contacto')->name('contacto');
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
/*
route::get('test', function(){

        $user = new App\User;
        $user->nombre = 'javier'
        $user->save();
        return $user;

});
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
