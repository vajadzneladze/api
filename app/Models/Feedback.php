<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_id',
        'local_id',
        'first_name',
        'last_name',
        'description',
        'position',
        'company',
        'status',
        'file_id'
    ];

    public function lang()
    {
        return $this->belongsTo('App\Models\Localization', 'local_id')->select('id', 'abbreviation', 'native');
    }

    public function img()
    {
        return $this->belongsTo('App\Models\File', 'file_id')->select('id', 'name', 'path', 'format');
    }
}
