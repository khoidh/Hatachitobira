<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoType extends Model
{
    const JOB_SHADOW_TYPE = 1;
    const ROLE_PLAY_TYPE = 2;
    const CONCEPT_MOVIE_TYPE = 3;
    CONST JOB_SHADOW = 'ジョブシャドウ';
    CONST ROLE_PLAY = 'ロールモデル';
    CONST CONCEPT_MOVIE = 'コンセプトムービー';

    protected $table = 'video_types';
    protected $fillable = ['name','description','slug'];

    public function videos()
    {
        return $this->hasMany('App\Models\video','type');
    }

    public function scopeNoConceptMovie($query)
    {
      return $query
        ->where('video_types.id', '!=', VideoType::CONCEPT_MOVIE_TYPE)
        ;
    }
}
