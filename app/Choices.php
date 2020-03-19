<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choices extends Model
{
    protected $table = 'choices';
    protected $fillable = ['first_choice','second_choice','stdID'];
    protected $dates = ['created_at', 'updated_at'];
}
