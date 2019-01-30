<?php

namespace Kinytron;

use Illuminate\Database\Eloquent\Model;


class College extends Model
{
    public $table = "colleges";
    protected $fillable = [
        'name','demo'
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function measurements(){
        return $this->hasMany(Measurement::class);
    }
}
