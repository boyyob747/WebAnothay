<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Teacher;
use App\User;
use Input;
use DB;
use Excel;
class FileExcelController extends Controller
{
      public function getImport()
    {
      return view('teachers.import_excel');
    }
    public function postImport()
    {
      $data = Excel::load(Input::file('teacher'), function($reader) {})->get();
       if(!empty($data) && $data->count()){
           foreach ($data->toArray() as $key => $value) {
               if(!empty($value)){
                 $teacher = new Teacher();
                 $teacher->ngaysinh = $value['ngaysinh'];
                 $teacher->sodienthoai = $value['sodienthoai'];
                 $teacher->truong = $value['truong'];
                 $teacher->khoa = $value['khoa'];
                 $user = User::create([
                     'name' => $value['name'],
                     'state' => '1',
                     'username' => $value['username'],
                     'email' =>  $value['email'],
                     'password' => bcrypt($value['password']),
                 ]);
                 $teacher->user_id = $user->id;
                 $teacher->save();
               }
           }
           return redirect('home/teacher');
    }
  }
}
