<?php

namespace Kinytron;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    public $table = "suggestions";

    protected $fillable = [
        'description','user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
