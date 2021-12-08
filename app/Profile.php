<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table    = 'profiles';
    protected $guarded= [];
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','facility_name','pic','caretaker_id','company_name','project_exit_date','effective_leave_date','thirty_day_notice','extension_granted','ninty_day_extension','monthly_rent_amount','entry_date','bed_hold_amount','date_of_bedhold_reciept','rent_source_id','mdoc_agent_id','educationl_level_id','consumer_type_id','bridge_card_eligible','injury','notes','nation_id_card','phone','dob','country','city','postal','address','status','image','bridge_card_eligible_check','gov_assistance_eligible','injury_check'];
    public function getUserDetail(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function getEducationLevelDetail(){
        return $this->hasOne(EducationLevel::class,'id','educationl_level_id');
    }

}