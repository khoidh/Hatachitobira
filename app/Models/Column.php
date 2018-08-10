<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    protected $table = 'columns';
    protected $fillable = ['category_id', 'title', 'description', 'image', 'sort', 'created_at', 'updated_at'];

    public function category()
    {
        return $this->belongsTo('App\Models\category','category_id');
    }

    public function favorites()
    {
        return $this->morphMany('App\Models\favorite','favoritable');
    }
}
