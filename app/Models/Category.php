<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function column()
    {
        return $this->hasMany('App\Models\column','category_id');
    }

    public function video()
    {
        return $this->hasMany('App\Models\video','category_id');
    }

    public function event()
    {
        return $this->hasMany('App\Models\event','category_id');
    }
}
