<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doner extends Model
{
      protected $fillable = [
        'name', 'address', 'phone', 'c_id',
    ];


    public function donerusers(){
        return $this->hasMany('App\DonateUser');
    }
}
