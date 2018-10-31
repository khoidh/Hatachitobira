<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use Carbon\Carbon;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = ['category_id', 'title','content','image', 'sort', 'time_from', 'time_to','started_at','closed_at','address','overview','capacity','entry_fee'];

    protected $appends = ['eventstatus'];


    public function category()
    {
        return $this->belongsTo('App\Models\category','category_id');
    }

    public function favorites()
    {
        return $this->morphMany('App\Models\favorite','favoritable');
    }

    public function getEventstatusAttribute(){
        $time_now = Carbon::now();
        $time_from = $this->attributes['time_from'];
        $time_to = $this->attributes['time_to'];
        $started_at = $this->attributes['started_at'];
        $closed_at = $this->attributes['closed_at'];

        if (strtotime($time_now) < strtotime($time_from)) {
            $status = '受付前';
        }
        else if (strtotime($time_now) >= strtotime($time_from) && strtotime($time_now) <= strtotime($time_to) ) {
            $status = '受付中';
        }
        else if (strtotime($time_now) > strtotime($time_to) && strtotime($time_now) < strtotime($started_at)) {
            $status = '受付終了';
        }
        else if (strtotime($time_now) >= strtotime($started_at) && strtotime($time_now) <= strtotime($closed_at)) {
            $status = '開催中';
        }
        else if (strtotime($time_now) > strtotime($closed_at)) {
            $status = '開催終了';
        }
        return $status;
    }
}
