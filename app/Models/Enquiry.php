<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $table = 'enquirys';
    protected $fillable = ['first_name','last_name','first_name_cn','last_name_cn','email','company','content'];
}
