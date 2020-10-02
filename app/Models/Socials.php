<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Socials extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_id',
        'local_id',
        'contact_id',
        'title',
        'url',
    ];
}
