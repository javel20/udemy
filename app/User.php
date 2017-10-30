<?php

namespace App;

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
            foreach($this->roles as $userRole){
                //dd($this->roles);
                
                if($userRole->name == $role){
                
                    return true;
                //$this = App\User;
                }
            }
        }

        return false;
        
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
}
