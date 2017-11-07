<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thongtinlophocphan extends Model
{
  public function lophocphan()
  {
    return $this->belongsTo('App\Lophocphan');
  }
  public function student()
  {
    return $this->belongsTo('App\Student','student_id');
  }
}
