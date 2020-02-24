<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'userId';
    protected $fillable = ['type'];
    protected $dates = ['created_at', 'updated_at'];
}
