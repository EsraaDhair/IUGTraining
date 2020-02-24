<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    protected $table = 'enterprises';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'mobile' ,'addressId'];
    protected $dates = ['created_at', 'updated_at'];
}
