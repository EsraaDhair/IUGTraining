<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'userId';
    protected $fillable = ['stdId','niche','endedHours','addressId'];
    protected $dates = ['created_at', 'updated_at'];
}
