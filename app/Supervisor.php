<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    protected $table = 'supervisors';
    protected $primaryKey = 'userId';
    protected $fillable = ['jobTitle','enterpriseId'];
    protected $dates = ['created_at', 'updated_at'];
}
