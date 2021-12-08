<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Caretaker extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'caretakers';


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
    // protected $fillable = ['user_id', 'company_id', 'full_name', 'email', 'password', 'phone', 'nation_id_card', 'dob', 'address', 'country', 'city', 'postal'];

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
    public function getUserDetail(){
        return $this->belongsTo(User::class,"user_id");
    }

    public function getFacilityDetail(){
        return $this->belongsTo(Facility::class,'facility_id');
    }//end getFacilityDetail function.
    
}
