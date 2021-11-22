<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
      protected $fillable = [
        'name', 'phone','deposit_funds','withdraw_funds',
    ];
}
