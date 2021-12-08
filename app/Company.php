<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'companies';
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
    protected $fillable = ['package_id', 'user_id', 'status', 'payment_status', 'is_custom_package_user', 'column_4', 'column_5'];

    public function getPackageDetail()
    {
        return $this->belongsTo(Package::class,"package_id");
    }

    public function getUserDetail()
    {
        return $this->belongsTo(User::class,"user_id");
    }
    public function getProfileDetail()
    {
        return $this->belongsTo(Profile::class,"user_id");
    }

    public function getStatusDetailAttribute(){
        if($this->status==1){
            return "<span class='badge badge-success badge-sm' style='cursor:pointer'>Active</span>";
        }else{
            return "<span class='badge badge-danger badge-sm' style='cursor:pointer'>Inactive<span>";
        }//end if else.
    }
    
}
