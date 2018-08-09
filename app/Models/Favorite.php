<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorites';
    protected $fillable = ['user_id', 'favoritable_id', 'favoritable_type'];

    public function user()
    {
        return $this->belongsTo('App\user','user_id');
    }


    public function favoritable()
    {
        return $this->morphTo();
    }
}
