<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'type_id',
    ];

    public function users(){
        return $this->hasMany('App\Users');
    }

    public function type(){
        return $this->hasOne('App\Models\Type','id','type_id');
    }
}
