<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OccasionAmount extends Model
{
      protected $fillable = [
        'name', 'occasion_id','addfund','cutfund',
    ];

     public function occasion() {
        return $this->belongsTo(Occasion::class, 'occasion_id');
    }
}
