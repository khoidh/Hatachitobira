<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taggable extends Model
{
    protected $table = 'taggables';
    protected $fillable = ['category_id', 'taggable_id', 'taggable_type'];
}
