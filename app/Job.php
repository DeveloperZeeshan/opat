<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'jobs';

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
    protected $fillable = ['user_id','title', 'location', 'description', 'city_id', 'department_id', 'job_type_id', 'status'];
    
    public function getLocationDetail(){
        return $this->belongsTo(Location::class, 'city_id');
    }
    public function getDepartmentDetail(){
        return $this->belongsTo(Department::class,'department_id');
    }
    public function getJobTypeDetail(){
        return $this->belongsTo(JobType::class,'job_type_id');
    }
    
}
