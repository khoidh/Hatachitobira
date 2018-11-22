<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopVideos extends Model
{
    protected $table = 'top_videos';
    protected $fillable = ['video_type_id', 'title', 'thumbnail', 'youtube_url'];
}
