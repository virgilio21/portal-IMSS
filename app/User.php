<?php

namespace App;
<<<<<<< HEAD

=======
use App\Role;
use App\User;
use App\StudentGroup;
>>>>>>> landing
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password','surnames', 'phone', 'enrollment', 'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
<<<<<<< HEAD
=======

    public function roles(){
        return $this-> belongsToMany(Role::class)->withTimestamps();
    }

    public function authorizeRoles($roles){
        abort_unless($this->hasAnyRole($roles), 401);
        return true;
    }

    public function hasAnyRole($roles){
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                 return true; 
            }   
        }
        return false;
    }

    public function hasRole($role){
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function matters(){
        return $this-> belongsToMany(Matter::class)->withTimestamps();
    }


    public function groups(){
        return $this-> belongsToMany(Group::class,'matter_user_user','user_id','matter_user_id')->withTimestamps();
    }


    //**************************** 
   /* public function follows(){
        return $this->belongsToMany(Group::class,'matter_user_user','matter_user_id','user_id');
    }*/

    public function isFollowing(Group $user){
        return $this -> followed -> contains($user);  
    }


    public function followed(){
        return $this->belongsToMany(Group::class,'matter_user_user','user_id','matter_user_id');
    }






    public function grupoAlumno(){
        return $this->hasMany(StudentGroup::class);
    }

>>>>>>> landing
}
