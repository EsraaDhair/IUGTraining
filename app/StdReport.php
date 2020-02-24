<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StdReport extends Model
{
    protected $table = 'students_report';
    protected $primaryKey = 'id';
    protected $fillable = ['studentId'];
    protected $dates = ['created_at', 'updated_at'];
}
