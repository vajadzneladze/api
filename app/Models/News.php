<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'title', 
        'description',
        'content',
        'file_name',
        'file_path',
        'view',
        'status',
        'user_id'
    ]; 

    public function author(){
        return $this->belongsTo('App\User','user_id','id')->withDefault([
            'name' => 'უცნობი ავტორი'
        ]);
    }
}
