<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Column extends Model
{
    protected $table = 'columns';

    protected $fillable = ['category_id', 'title', 'description', 'content', 'image', 'sort', 'type', 'created_at', 'updated_at'];

    protected $appends = ['columnliked','categoryname'];

    public function category()
    {
        return $this->belongsTo('App\Models\category','category_id');
    }

    public function favorites()
    {
        return $this->morphMany('App\Models\favorite','favoritable');
    }

    public function getColumnlikedAttribute(){
        $like = 0;
        $column_id = $this->attributes['id'];
        if (Auth::user()) {
            $user_id = Auth::user()->id;
            $favorite = Favorite::where('user_id', $user_id)
                ->where('favoritable_id', $column_id)
                ->where('favoritable_type', 'columns')->get();
            if (count($favorite) > 0) {
                $like = 1;
            }
        }
        return $like;
    }

    public function getCategorynameAttribute(){
        $category_id = $this->attributes['category_id'];
        $categoryname =Category::find($category_id);
        return $categoryname->name;
    }
}
