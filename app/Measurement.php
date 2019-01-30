<?php

namespace Kinytron;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    public $table = "measurements";
    protected $fillable = [
        'user_id','college_id','exam_id','course_id','active'
    ];
    public function exam(){
        return $this->belongsTo(Exam::class);
    }
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function college(){
        return $this->belongsTo(College::class);
    }
}
