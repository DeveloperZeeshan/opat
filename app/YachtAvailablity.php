<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class YachtAvailablity extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'yacht_availabilities';

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
    
    public function getYacht(){
        return $this->belongsTo(Yacht::class,'yacht_type_id');
    }//end getPriceList function.
    public function getCharterType(){
        return $this->belongsTo(CharterType::class,'charter_type_id');
    }//end getPriceList function.
    public function getCompanyDetail(){
        return $this->belongsTo(Company::class,"company_id");
    }
    
    
}
