<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    const JOB_SHADOW_TYPE = 0;
    const ROLE_PLAY_TYPE = 1;
    const CONCEPT_MOVIE_TYPE = 2;

    protected $table = 'videos';
    protected $fillable = ['category_id', 'url', 'description', 'image', 'sort','type'];
    protected $appends = ['categoryname','videoliked'];

    public function category()
    {
        return $this->belongsTo('App\Models\category','category_id');
    }

    public function favorites()
    {
        return $this->morphMany('App\Models\favorite','favoritable');
    }
        CONST JOB_SHADOW = 'ジョブシャドウ';
        CONST ROLE_PLAY = 'ロールプレイ';

    public function getCategorynameAttribute(){
        $category_id = $this->attributes['category_id'];
        $categoryname =Category::find($category_id);
        return $categoryname->name;
    }

    public function getVideolikedAttribute(){
        $like = 0;
        $column_id = $this->attributes['id'];
        if (Auth::user()) {
            $user_id = Auth::user()->id;
            $favorite = Favorite::where('user_id', $user_id)
                ->where('favoritable_id', $column_id)
                ->where('favoritable_type', 'videos')->get();
            if (count($favorite) > 0) {
                $like = 1;
            }
        }
        return $like;
    }
}

