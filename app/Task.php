<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $fillable = ['title','description','startTime','expectedTime','actualTime','supervisorId','studentId'];
    protected $dates = ['created_at', 'updated_at'];
}
