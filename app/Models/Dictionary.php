<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_id',
        'local_id',
        'key',
        'value',
        'module',
    ];

    protected $appends = ['language'];


    public function lang()
    {
        return $this->belongsTo('App\Models\Localization', 'local_id')->select('id', 'abbreviation', 'native');
    }

    public function getLanguageAttribute()
    {
        return $this->lang->native;
    }
}
