<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    protected $table = 'videos';
    protected $fillable = ['category_id', 'url', 'description', 'image', 'sort','type'];
    protected $appends = ['categoryname'];

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

}

