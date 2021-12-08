<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CognitivePsycological extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cognitive_psycologicals';

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
    protected $fillable = ['consumer_id','consumer_name','added_by','memory_problem','memory_problem_check','memory_care_check','memory_care','ambulatory','ambulatory_check', 'perception', 'language', 'critical_thinking', 'status'];

    public function getUserDetail(){
        return $this->belongsTo(User::class,"user_id");
    }
}
