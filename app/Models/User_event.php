<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_event extends Model
{
    protected $table = 'user_events';

    public function user()
    {
        return $this->belongsTo('App\user','user_id');
    }
}
