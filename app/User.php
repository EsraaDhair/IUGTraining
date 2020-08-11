<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;


/**
 * @method static create(array $array)
 */
class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email','password', 'mobile'];
    protected $dates = ['created_at', 'updated_at'];

    // Admin has many users
    public function students(){
        return $this->hasMany("App\Student");
    }

}
