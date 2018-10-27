<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';
    protected $fillable = ['category_id', 'url', 'description', 'image', 'sort','type'];

    public function category()
    {
        return $this->belongsTo('App\Models\category','category_id');
    }

    public function favorites()
    {
        return $this->morphMany('App\Models\favorite','favoritable');
    }
}
