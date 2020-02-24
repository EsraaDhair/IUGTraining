<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    protected $primaryKey = 'id';
    protected $fillable = ['city', 'street'];
    protected $dates = ['created_at', 'updated_at'];
}
