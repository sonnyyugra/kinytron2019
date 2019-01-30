<?php

namespace Kinytron;

use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Evaluation extends Model
{
    public $table = "evaluations";

    protected $fillable = [
        'course_id','user_id','workshop','score'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function course(){
        return $this->belongsTo(Course::class);
    }

}
