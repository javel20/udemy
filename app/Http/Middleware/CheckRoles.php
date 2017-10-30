<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        //class 21
        //para pasar multiples parametros al middleware
        $roles1 = func_get_args(); //devuelve un array con todos los parametros del metodo en el que estamos
        $roles = array_slice($roles1,2); //para sacar los dos primeros del array

        //foreach($roles as $role){
            //con el foreach devuelve string
            //if(auth()->user()->role === $role){
            if(auth()->user()->hasRoles($roles)){
                return $next($request);
            }

        //}
        return redirect('/');
    }

}