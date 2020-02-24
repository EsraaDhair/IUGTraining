<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EQuestions extends Model
{
    protected $table = 'e_questions';
    protected $primaryKey = 'id';
    protected $fillable = ['QText','answer','comment','QOrder','reportId'];
    protected $dates = ['created_at', 'updated_at'];
}
