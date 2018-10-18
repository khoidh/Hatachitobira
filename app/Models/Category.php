<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name','description'];

    public function columns()
    {
        return $this->hasMany('App\Models\column','category_id');
    }

    public function videos()
    {
        return $this->hasMany('App\Models\video','category_id');
    }

    public function events()
    {
        return $this->hasMany('App\Models\event','category_id');
    }
}
