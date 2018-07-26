<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    protected $table = 'columns';

    public function category()
    {
        return $this->belongsTo('App\Models\category','category_id');
    }
}
