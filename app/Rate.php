<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table = 'rates';
    protected $primaryKey = 'id';
    protected $fillable = ['rate','comment','taskId'];
    protected $dates = ['created_at', 'updated_at'];
}
