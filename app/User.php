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

    //uno a uno user role
    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function hasRoles(array $roles){
        
        foreach($roles as $role)
        {
            if($this->role->name == $role){
            
                return true;
            //$this = App\User;
            }
        }
        return false;
        
    }

    /*
    public function hasRoles($role){

        return $this->role = $role;
        //$this = App\User;

    }
    */
}
