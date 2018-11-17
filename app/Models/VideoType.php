<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoType extends Model
{
    protected $table = 'video_types';
    protected $fillable = ['name','description','slug'];

    public function videos()
    {
        return $this->hasMany('App\Models\video','type');
    }
}
