<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonateUser extends Model
{
      protected $fillable = [
        'doner_id','amount', 'year', 'january', 'february','march','april','may','june','july','august','september','october','november','december',
    ];


      public function doner() {
        return $this->belongsTo(Doner::class, 'doner_id');
    }
}
