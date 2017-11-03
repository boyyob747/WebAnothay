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
      $successOrFailed = true;
      $msgError = "<br> ";
      $msgSucces = "<br> ";
      $dong = 0;
      $data = Excel::load(Input::file('teacher'), function($reader) {})->get();
       if(!empty($data) && $data->count()){
           foreach ($data->toArray() as $key => $value) {
               if(!empty($value)){
                 $dong = $dong + 1;
                $checkUser =  User::where('username', $value['username'])->get();
                if ($checkUser->isEmpty()) {
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
                   $msgSucces = $msgSucces . "Dòng : $dong username : " . $value['username'] . " đã nhập thành công"."<br>";
                }
                else {
                    $successOrFailed = false;
                    $msgError = $msgError . "Dòng : $dong username : " . $value['username'] . " đã có trong hệ thống"."<br>";
                }
               }
           }
           if ($successOrFailed == true)
           {
            return back()->with('success','Đã nhập dữ liệu thành công');
           }
           else {
            return back()->with('usernameInsertError',$msgError)->with('success',$msgSucces);
           }
         }
         return;
    }

  public function getExportTeachers()
  {
    $teachers = teacher::all();
    //echo $teachers;
    foreach ($teachers as $teacher) {
      $teacher = ["username" => $teacher->user->username,"password" => $teacher->user->password
    ,"name" => $teacher->user->name,"email" => $teacher->user->email,
    "ngaysinh" => $teacher->ngaysinh ,"sodienthoai" => $teacher->sodienthoai,"truong" => $teacher->truong
  ,"khoa" => $teacher->khoa];
      $arrTeacher[] = $teacher;
    }
    //return $arr;
    Excel::create('Export Data',function($excel) use ($arrTeacher){
      $excel->sheet('Sheet 1',function($sheet) use ($arrTeacher){
        $sheet->fromArray($arrTeacher);
      })->export('xlsx');
    });
  }
}
