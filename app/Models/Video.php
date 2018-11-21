<?php

namespace App;
use Auth;
Use App\Models\VideoType;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';
    protected $fillable = ['category_id', 'url', 'description', 'image', 'sort','type','published_at', 'display'];
    protected $appends = ['categoryname','videoliked'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\VideoType','type');
    }

    public function favorites()
    {
        return $this->morphMany('App\Models\favorite','favoritable');
    }

    public function getCategorynameAttribute(){
        $category_id = $this->attributes['category_id'];
        $id = $this->attributes['id'];
        $cate_id = Taggable::where('taggable_id',$id)->where('taggable_type',(new Video())->getTable())->pluck('category_id')->toArray();
        if (!$cate_id) {
            array_push($cate_id, $category_id);
        }
        $categoryname = Category::whereIn('id',$cate_id)->pluck('name')->toArray();
        $categoryname = implode('   ,   ', $categoryname);
        
        return $categoryname;
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

