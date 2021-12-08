<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RentPayment extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rent_payments';

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
    protected $fillable = ['consumer_id', 'rent_date', 'bed_amount', 'actual_amount','due_amount','recieved_amount', 'added_by', 'status','company_id'];

    public function getUserDetail(){
        return $this->belongsTo(User::class,"consumer_id");
    }

    public function getConsumerDetail(){
        return $this->belongsTo(User::class,"consumer_id");
    }
    
    public function getAddedByDetail(){
        return $this->belongsTo(User::class,"added_by");
    }
    public function getFinanceDetail()
    {
        return $this->belongsTo(Finance::class,"user_id");
    }
    
     public function getCompanyDetail()
    {
        return $this->belongsTo(Company::class,"company_id");
    }


}
