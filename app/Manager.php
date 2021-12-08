<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manager extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'managers';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $guarded = [];
//    protected $fillable = ['full_name','email','password','view_password', 'phone', 'nation_id_card', 'age', 'dob', 'address', 'country', 'city', 'postal', 'company_id', 'package_id'];

    public function getPackageDetails()
    {
        return $this->belongsTo(Package::class,"package_id");
    }
    public function getCompanyDetail()
    {
        return $this->belongsTo(Company::class,"company_id");
    }
    public function getProfileDetail()
    {
        return $this->belongsTo(Profile::class,"user_id");
    }
    public function getProfileDetails()
    {
        return $this->hasOne(Profile::class,"user_id");
    }
    public function getUserDetail()
    {
        return $this->belongsTo(User::class,"user_id");
    }
    

    
}
