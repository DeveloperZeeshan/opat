<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobType extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'job_types';
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
    protected $fillable = ['name', 'status'];

    public function getStatusDetailAttribute(){
        if($this->status==1){
            return "<span class='badge badge-success badge-sm' style='cursor:pointer'>Active</span>";
        }else{
            return "<span class='badge badge-danger badge-sm' style='cursor:pointer'>Inactive<span>";
        }//end if else.
    }
}
