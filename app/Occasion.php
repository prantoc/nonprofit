<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occasion extends Model
{
      protected $fillable = [
        'name', 'year','addfund','cutfund',
    ];
}
