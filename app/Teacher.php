<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
  protected $fillable = ['ngaysinh','truong','khoa','sodienthoai'];
  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
