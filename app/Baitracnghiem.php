<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baitracnghiem extends Model
{
  protected $fillable = ['title','soluongcauhoi','diemcua','duration'];
  public function lophocphan()
  {
    return $this->belongsTo('App\Lophocphan', 'lophoc_id');
  }
  public function cauhoi()
  {
    return $this->hasMany('App\Cauhoi');
  }
}
