<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'training';
    protected $primaryKey = 'id';
    protected $fillable = ['sector','type','enterpriseId','studentId','work_timeId'];
    protected $dates = ['created_at', 'updated_at'];
}
