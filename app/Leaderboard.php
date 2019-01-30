<?php

namespace Kinytron;

use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{
    public $table = "leaderboards";
    protected $fillable = [
        'user_id','score','exam_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function exam(){
        return $this->belongsTo(Exam::class);
    }
}
