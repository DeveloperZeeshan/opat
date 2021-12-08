<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobRequest extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'job_requests';
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
    protected $fillable = ['name', 'email', 'job_id', 'attachment', 'notes', 'status'];

    public function getJobDetail(){
        return $this->belongsTo(Job::class,'job_id');
    }//end getJobDetail function.
    public function getStatusDetailAttribute(){
        if($this->status==1){
            return "<span class='badge badge-success badge-sm' style='cursor:pointer'>Active</span>";
        }else{
            return "<span class='badge badge-danger badge-sm' style='cursor:pointer'>Inactive<span>";
        }//end if else.
    }
    
}
