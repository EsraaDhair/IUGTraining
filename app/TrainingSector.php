<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingSector extends Model
{
    protected $table = 'training_sectors';
    protected $primaryKey = 'id';
    protected $fillable = ['title','#femaleStudents','#maleStudents','enterpriseId'];
    protected $dates = ['created_at', 'updated_at'];
}
