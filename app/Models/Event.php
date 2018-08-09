<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = ['category_id', 'title', 'image', 'sort', 'time_from', 'time_to'];

    public function category()
    {
        return $this->belongsTo('App\Models\category','category_id');
    }

    public function favorites()
    {
        return $this->morphMany('App\Models\favorite','favoritable');
    }
}
