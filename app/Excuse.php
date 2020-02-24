<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Excuse extends Model
{
    protected $table = 'excuses';
    protected $fillable = ['date','excuse','stdId'];
    protected $dates = ['created_at', 'updated_at'];
}
