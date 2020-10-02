<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'title',
        'description',
    ];

    public function subjects(){
        return $this->hasMany('App\Models\Subject');
    }
}
