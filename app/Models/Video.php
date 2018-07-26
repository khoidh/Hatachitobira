<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

    public function category()
    {
        return $this->belongsTo('App\Models\category','category_id');
    }

    public function favorite()
    {
        return $this->hasMany('App\Models\favorite','video_id');
    }
}
