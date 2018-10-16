<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $table = 'enquiries';
    protected $fillable = ['category_id','first_name','last_name','first_name_cn','last_name_cn','email','company','content','postal_code','address'];
}
