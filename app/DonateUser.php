<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonateUser extends Model
{
      protected $fillable = [
        'name', 'address', 'phone','amount', 'month','year', 'january', 'february','march','april','may','june','july','august','september','october','november','december',
    ];
}
