<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorites';

    public function user()
    {
        return $this->belongsTo('App\user','user_id');
    }

    public function event()
    {
        return $this->belongsTo('App\event','event_id');
    }

    public function video()
    {
        return $this->belongsTo('App\video','video_id');
    }
}
