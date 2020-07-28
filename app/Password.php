<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Password extends Authenticatable
{
    protected $table = 'passwords';
    protected $primaryKey = 'userId';
    protected $fillable = ['password'];
    protected $dates = ['created_at', 'updated_at'];
}
