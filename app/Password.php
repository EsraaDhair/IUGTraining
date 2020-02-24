<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    protected $table = 'passwords';
    protected $primaryKey = 'userId';
    protected $fillable = ['password'];
    protected $dates = ['created_at', 'updated_at'];
}
