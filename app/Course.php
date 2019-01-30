<?php

namespace Kinytron;

use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Course extends Model
{
    protected $fillable = [
        'level','letter','college_id','e1','e2','e3','e4','e5','e6','e7','e8','e9','e10','e11','e12','e13','e14','e15','e16','e17','e18','e19','e20','v1','v2','v3','v4','v5','v6','v7','v8'
    ];
    public function college(){
        return $this->belongsTo(College::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }
    public function evaluations(){
        return $this->hasMany(Evaluation::class);
    }
    public function getFullNameAttribute()
    {
        return $this->level . ' ' . $this->letter;
    }
    public function measurements(){
        return $this->hasMany(Measurement::class);
    }

}
