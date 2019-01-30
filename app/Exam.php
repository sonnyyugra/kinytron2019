<?php

namespace Kinytron;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public $table = "exams";
    protected $fillable = [
        'name',
    ];
    public function leaderboards(){
        return $this->hasMany(Leaderboard::class);
    }
}
