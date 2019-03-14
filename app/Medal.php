<?php

namespace Kinytron;

use Illuminate\Database\Eloquent\Model;

class Medal extends Model
{
    public $table = "medals";

    protected $fillable = [
        'name','description'
    ];
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
