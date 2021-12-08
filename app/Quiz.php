<?php

namespace App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'quizzes';

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
    protected $fillable = ['user_id','lms_id','question', 'answer', 'description','question_type','option','correct_answer','question','answer', 'status'];

    public function getSmallAnswerAttribute(){
        return Str::words($this->answer, 1, '...');
    }//end getShortAnswerAttribute function.    
    public function getSmallCorrectAnswerAttribute(){
        return Str::words($this->correct_answer, 7, '...');
    }//end getSmallCorrectAnswerAttribute function.    
    public function getShortTitleAttribute(){
        return Str::words($this->title, 4, '...');
    }//end getShortTitleAttribute function. 
}
