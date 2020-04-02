<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    protected $table = 'enterprises';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'logo', 'email', 'mobile','addressId'];
    protected $dates = ['created_at', 'updated_at'];

    public function getLogoAttribute($value)
    {
        if($value){
            return url('uploads/images/enterpriseLogo/'.$value);
        }else{
            return url('uploads/images/enterpriseLogo/defualt.jpg');
        }
    }
}
