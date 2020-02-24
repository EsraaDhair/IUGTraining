<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StdQuestions extends Model
{
    protected $table = 'std_questions';
    protected $primaryKey = 'id';
    protected $fillable = ['QText','answer','QOrder','reportId'];
    protected $dates = ['created_at', 'updated_at'];
}
