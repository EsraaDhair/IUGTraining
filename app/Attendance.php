<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';
    protected $primaryKey = 'studentUserId';
    protected $fillable = ['date','startWork', 'endWork','comment'];
    protected $dates = ['created_at', 'updated_at'];
}
