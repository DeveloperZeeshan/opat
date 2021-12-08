<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Yacht extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'yachts';

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
    
    public function getYachtType(){
        return $this->belongsTo(YachtType::class,'yacht_type_id');
    }//end getPriceList function.
    public function getCharterType(){
        return $this->belongsTo(CharterType::class,'charter_type_id');
    }//end getPriceList function.
    
    public function getAvailablityDate(){
        return $this->hasOne(YachtAvailablity::class,'yacht_id')->where('is_deleted','false');
    }
    public function getAvailablity(){
        return $this->hasOne(YachtAvailablity::class,'yacht_id')->where('is_deleted','false');
    }
    public function getAvailablities(){
        return $this->hasMany(YachtAvailablity::class,'yacht_id')->where('is_deleted','false');
    }

    public function getGalleryImages(){
        return $this->hasMany(GalleryImage::class,'yacht_id');
    }//end getGalleryImages function.
}
