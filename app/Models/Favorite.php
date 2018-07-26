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


    public function favoritable()
    {
        return $this->morphTo();
    }
}
