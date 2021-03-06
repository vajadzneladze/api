<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
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

    public function lang()
    {
        return $this->belongsTo('App\Models\Localization', 'local_id')->select('id', 'abbreviation', 'native');
    }
}
