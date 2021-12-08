<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medication extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'medications';

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
    protected $fillable = ['consumer_id', 'medication', 'frequency_taken', 'start_date', 'end_date', 'added_by'];

    public function getConsumerDetail(){
        return $this->belongsTo(User::class,"consumer_id");
    }//end getConsumerDetail function.
    
    public function getAddedByDetail(){
        return $this->belongsTo(User::class,"added_by");
    }//end getAddedByDetail function.
    
}//end class.
