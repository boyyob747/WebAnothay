<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monhoc extends Model
{
  public function lophocphan()
  {
    return $this->hasMany('App\Lophocphan');
  }
}
