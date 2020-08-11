<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
      protected $fillable = [
        'name', 'address', 'phone','amount','purpose', 'january', 'february','march','april','may','june','july','august','september','october','november','december',
    ];
}
