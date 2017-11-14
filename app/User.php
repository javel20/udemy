<?php

namespace App;

use App\Presenters\UserPresenter;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'role_id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    //relacion porlimorfica de muchos a muchos
    public function tags(){
        
        return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
    
    }

    //relacion polimorfica uno a uno
    public function note(){
        
        return $this->morphOne(Note::class,'notable');
        
    }

    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

    /*
    //uno a uno user role
    public function role(){
        return $this->belongsTo(Role::class);
    }
    */

    //muchos a muchos user role
    public function roles(){
        //para que sepa el nombre de la tabla pivot se pone como segundo parametro
        return $this->belongsToMany(Role::class,'assigned_roles');
    }


    //muchos a muchos con pivot
    public function hasRoles(array $roles){
        
        foreach($roles as $role)
        {
            //con colleccion
            //tenemos todos los nombres de los roles y con contains preguntamos si contiene alguno de los roles que recibimos por aqui
            //intersect siempre duvuelve un array, count para que devuelva 1 o mas si existen intersecciones true, si no hay 0 false
            return $this->roles->pluck('name')->intersect($roles)->count();

            //sin collective
            //foreach($this->roles as $userRole){
                //dd($this->roles);
                //if($userRole->name == $role){
                
                  //  return true;
                //$this = App\User;
                //}
            //}
        }

       // return false;
        
    }

    /*
    //uno a uno o uno a muchos
    public function hasRoles(array $roles){
        
        foreach($roles as $role)
        {
            if($this->roles->name == $role){
            
                return true;
            //$this = App\User;
            }
        }
        return false;
        
    }
    */

    
    /*
    //misma tabla user
    public function hasRoles($role){

        return $this->role = $role;
        //$this = App\User;

    }
    */

    public function present(){
        //$this es el objeto message actual
        return new UserPresenter($this);
    }
}
