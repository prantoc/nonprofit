<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserYear extends Model
{
      protected $fillable = [
        'donate_id','year',
    ];
}
