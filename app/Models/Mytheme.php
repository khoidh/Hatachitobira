<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mytheme extends Model
{
    protected $table = 'my_themes';

    protected $fillable = ['user_id','memo','last_log','keywords','this_mytheme','this_action','category_id','content_lable','content_1','content_2','content_3','content_4','month','year'];
}