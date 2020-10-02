<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slogan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_id',
        'local_id',
        'title',
        'description',
        'status',
    ];
}
