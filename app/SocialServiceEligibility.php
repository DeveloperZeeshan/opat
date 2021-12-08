<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialServiceEligibility extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'social_service_eligibilities';
    protected $appends = ['status_detail'];

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
    protected $fillable = ['consumer_id', 'eligibility', 'status'];

    public function getUserDetail(){
        return $this->belongsTo(User::class,"consumer_id");
    }
    public function getStatusDetailAttribute(){
        if($this->status==1){
            return "<span class='badge badge-success badge-sm' style='cursor:pointer'>Active</span>";
        }else{
            return "<span class='badge badge-danger badge-sm' style='cursor:pointer'>Inactive<span>";
        }//end if else.
    }
}
