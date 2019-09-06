<?php

namespace Kinytron;

use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;



class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_type', 'college_id', 'course_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function college()
    {
        return $this->belongsTo(College::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }
    public function medals()
    {
        return $this->belongsToMany(Medal::class);
    }
}
