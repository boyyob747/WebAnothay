<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lophocphan extends Model
{
  protected $fillable = ['ten_lophocphans','id'];
  public function monhoc()
  {
    return $this->belongsTo('App\Monhoc');
  }
  public function teacher()
  {
    return $this->belongsTo('App\Teacher');
  }
}
