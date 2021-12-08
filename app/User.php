<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','view_password','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function permissionsList(){
        $roles = $this->roles;
        $permissions = [];
        foreach ($roles as $role){
            $permissions[] = $role->permissions()->pluck('name')->implode(',');
        }
       return collect($permissions);
    }

    public function permissions(){
        $permissions = [];
        $role = $this->roles->first();
        $permissions = $role->permissions()->get();
        return $permissions;
    }

    public function isAdmin(){
       $is_admin =$this->roles()->where('name','admin')->first();
       if($is_admin != null){
           $is_admin = true;
       }else{
           $is_admin = false;
       }
       return $is_admin;
    }

    public function getCompanyDetail(){
        return $this->hasOne(Company::class,'user_id');
    }//end getCompanyDetail function.
    public function getManagerDetail(){
        return $this->hasOne(Manager::class,'user_id');
    }//end getManagerDetail function.
    public function getCaretakerDetail(){
        return $this->hasOne(Caretaker::class,'user_id');
    }//end getCaretakerDetail function.
    
    public function getConsumerDetail(){
        return $this->hasOne(Consumer::class,'user_id');
    }//end getCaretakerDetail function.
    
    public function getFinanceManagerDetail(){
        return $this->hasOne(Finance::class,'id','added_by_id');
    }//end getFinanceDetail function.
    public function getFinanceDetail(){
        return $this->hasOne(Finance::class,'added_by_id');
    }//end getFinanceDetail function.
    public function getEducationalLevelDetail(){
        return $this->hasOne(EducationalLevel::class,'id');
    }//end getCompanyDetail function.
}
