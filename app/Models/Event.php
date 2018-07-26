<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    public function category()
    {
        return $this->belongsTo('App\Models\category','category_id');
    }

    public function favorite()
    {
        return $this->hasMany('App\Models\favorite','event_id');
    }
}
