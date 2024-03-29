<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  protected $fillable = ['ngaysinh','lop','khoa','sodienthoai','mssv'];
  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
