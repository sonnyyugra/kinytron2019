<?php

namespace Kinytron;

use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Test extends Model
{
    public $table = "tests";
    protected $fillable = [
        'p1', 'p2', 'p3','p4','p5','p6','p7','p8','p9','p10','p11','p12','p13','p14','p15','p16','p17','p18','p19','p20','user_id','number'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
