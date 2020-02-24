<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkTime extends Model
{
    protected $table = 'work_times';
    protected $primaryKey = 'id';
    protected $fillable = ['startTime','endTime','saturday','sunday','monday','tuesday','wednesday','thursday','training_sectorId'];
    protected $dates = ['created_at', 'updated_at'];
}
