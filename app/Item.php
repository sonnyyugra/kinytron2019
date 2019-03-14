<?php

namespace Kinytron;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $table = "items";

    protected $fillable = [
        'name','description'
    ];
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
