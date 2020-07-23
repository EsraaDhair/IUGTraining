<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';
    protected $primaryKey = 'id';
    protected $fillable = ['image','title','subTitle','rank','active'];
    protected $dates = ['created_at', 'updated_at'];
}
