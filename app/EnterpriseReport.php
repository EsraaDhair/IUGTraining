<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnterpriseReport extends Model
{
    protected $table = 'enterprises_report';
    protected $primaryKey = 'id';
    protected $fillable = ['enterpriseId'];
    protected $dates = ['created_at', 'updated_at'];
}
