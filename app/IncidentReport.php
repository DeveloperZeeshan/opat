<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IncidentReport extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'incident_reports';

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
    protected $fillable = ['consumer_id', 'nature_of_incident', 'incident_detail', 'additional_notes', 'incident_date', 'report_created_by', 'status'];

    public function getConsumerDetail(){
        return $this->belongsTo(User::class,"consumer_id");
    }//end getConsumerDetail function.
    
    public function getAddedByDetail(){
        return $this->belongsTo(User::class,"report_created_by");
    }//end getAddedByDetail function.


    
}
