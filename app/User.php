<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class User extends Model
{

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'mobile'];
    protected $dates = ['created_at', 'updated_at'];

    // Admin has many users
    public function students(){
        return $this->hasMany("App\Student");
    }

}
