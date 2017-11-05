<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baitracnghiem extends Model
{
  public function lophocphan()
  {
    return $this->belongsTo('App\Lophocphan');
  }
}
