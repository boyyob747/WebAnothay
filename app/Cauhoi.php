<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cauhoi extends Model
{
  public function baitracnghiem()
  {
    return $this->belongsTo('App\Baitracnghiem');
  }
}
