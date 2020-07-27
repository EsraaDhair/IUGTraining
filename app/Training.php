<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'training';
    protected $primaryKey = 'id';
    protected $fillable = ['id','sector','type','enterpriseId','studentId','approved','placeOfTraining',];
    protected $dates = ['created_at', 'updated_at'];
}
