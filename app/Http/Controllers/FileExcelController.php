<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Teacher;
use App\Student;
use App\User;
use App\Diem;
use App\Thongtinlophocphan;
use Input;
use DB;
use Excel;
class FileExcelController extends Controller
{
      public function getImport()
    {
      return view('teachers.import_excel');
    }
    public function check($array, $keys){
      foreach ($keys as $key) {
        if(array_key_exists($key, $array)) {
            if (is_null($array[$key])) {
                return false;
            } else {

            }
          }
          else{
            return false;
          }
      }
      return true;
    }
    public function postImportDanhSachSinhvien(Request $request)
    {
      $successOrFailed = true;
      $msgError = "<br> ";
      $msgSucces = "<br> ";
      $dong = 0;
      $data = Excel::load(Input::file('sinhvien'), function($reader) {})->get(); //lophocphan_id
       if(!empty($data) && $data->count()){
           foreach ($data->toArray() as $key => $value) {
               if(!empty($value)){
                 $dong = $dong + 1;
                 if($this->check($value, ['name','ngaysinh','email','mssv','khoa','lop','sodienthoai','khoa']))
                 {
                   $checkUser =  User::where('username', $value['mssv'])->get();
                   if ($checkUser->isEmpty()) {
                      $sinhvien = new Student();
                      $sinhvien->ngaysinh = $value['ngaysinh'];
                      $sinhvien->sodienthoai = $value['sodienthoai'];
                      $sinhvien->lop = $value['lop'];
                      $sinhvien->mssv = $value['mssv'];
                      $sinhvien->khoa = $value['khoa'];
                      $user = User::create([
                          'name' => $value['name'],
                          'state' => 0,
                          'username' => $value['mssv'],
                          'email' =>  $value['email'],
                          'password' => bcrypt($value['ngaysinh']),
                      ]);
                      $sinhvien->user_id = $user->id;
                      $sinhvien->save();
                     //da tao sinh vien roi nhap vao thong tin lop
                     $thongtinlophocphan = new Thongtinlophocphan();
                     $thongtinlophocphan->student_id = $sinhvien->id;
                     $thongtinlophocphan->STT = $dong;
                     $thongtinlophocphan->lophocphan_id = $request['lophocphan_id'];
                     $thongtinlophocphan->nhom_thi = $dong > 28 ? 'B' : 'A';
                     $diem = new Diem();
                     $diem->save();
                     $thongtinlophocphan->diem_id = $diem->id;
                     $thongtinlophocphan->save();
                   }
                   else {
                       $student = Student::where('user_id', $checkUser->first()->id)->get()->first();
                       $thongtinlophocphan = new Thongtinlophocphan();
                       $thongtinlophocphan->student_id = $student->id;
                       $thongtinlophocphan->STT = $dong;
                       $thongtinlophocphan->lophocphan_id = $request['lophocphan_id'];
                       $thongtinlophocphan->nhom_thi = $dong > 28 ? 'B' : 'A';
                       $diem = new Diem();
                       $diem->save();
                       $thongtinlophocphan->diem_id = $diem->id;
                       $thongtinlophocphan->save();
                   }
                 }
                 else {
                   $successOrFailed = false;
                   $msgError = $msgError . "Dòng : $dong Không đúng như dạng ví dụ hoặc không có dữ liệu ở dòng đó <br>";
                 }
               }
             }
           if ($successOrFailed == true)
           {
           return back()->with('success','Đã nhập dữ liệu thành công');
           }
           else {
             if($msgSucces == '<br> ')
             $msgSucces = 'Không thể nhập được dữ liệu';
           return back()->with('usernameInsertError',$msgError)->with('success',$msgSucces);
           }
         }
    }
    public function postImportSinhvien()
    {
      $successOrFailed = true;
      $msgError = "<br> ";
      $msgSucces = "<br> ";
      $dong = 0;
      $data = Excel::load(Input::file('sinhvien'), function($reader) {})->get();
       if(!empty($data) && $data->count()){
           foreach ($data->toArray() as $key => $value) {
               if(!empty($value)){
                 $dong = $dong + 1;
                 if($this->check($value, ['name','ngaysinh','email','mssv','khoa','lop','sodienthoai','khoa']))
                 {
                   $checkUser =  User::where('username', $value['mssv'])->get();
                   if ($checkUser->isEmpty()) {
                      $sinhvien = new Student();
                      $sinhvien->ngaysinh = $value['ngaysinh'];
                      $sinhvien->sodienthoai = $value['sodienthoai'];
                      $sinhvien->lop = $value['lop'];
                      $sinhvien->mssv = $value['mssv'];
                      $sinhvien->khoa = $value['khoa'];
                      $user = User::create([
                          'name' => $value['name'],
                          'state' => 0,
                          'username' => $value['mssv'],
                          'email' =>  $value['email'],
                          'password' => bcrypt($value['ngaysinh']),
                      ]);
                      $sinhvien->user_id = $user->id;
                      $sinhvien->save();
                      $msgSucces = $msgSucces . "Dòng : $dong mã số sinh viên : " . $value['mssv'] . " đã nhập thành công"."<br>";
                   }
                   else {
                       $successOrFailed = false;
                       $msgError = $msgError . "Dòng : $dong mã số sinh viên : " . $value['mssv'] . " đã có trong hệ thống"."<br>";
                   }
                 }
                 else {
                   $successOrFailed = false;
                   $msgError = $msgError . "Dòng : $dong Không đúng như dạng ví dụ hoặc không có dữ liệu ở dòng đó <br>";
                 }
               }
             }
           if ($successOrFailed == true)
           {
           return back()->with('success','Đã nhập dữ liệu thành công');
           }
           else {
             if($msgSucces == '<br> ')
             $msgSucces = 'Không thể nhập được dữ liệu';
             return back()->with('usernameInsertError',$msgError)->with('success',$msgSucces);
           }
         }
        // return;
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
                 if($this->check($value, ['name','ngaysinh','email','username','khoa','truong','sodienthoai','password']))
                 {
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
                 else {
                   $successOrFailed = false;
                   $msgError = $msgError . "Dòng : $dong Không đúng như dạng ví dụ hoặc không có dữ liệu ở dòng đó <br>";
                 }
               }
           }
           if ($successOrFailed == true)
           {
            return back()->with('success','Đã nhập dữ liệu thành công');
           }
           else {
             if($msgSucces == '<br> ')
             $msgSucces = 'Không thể nhập được dữ liệu';
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
  public function getExportSinhviens()
  {
    $students = Student::all();
    //echo $teachers;
    foreach ($students as $student) {
      $sinhvien= ["name" => $student->user->name,"mssv" => $student->mssv
    ,"sodienthoai" => $student->sodienthoai,"lop" => $student->lop,
    "khoa" => $student->khoa ,"ngaysinh" => $student->ngaysinh,"email" => $student->user->email];
      $arrStudents[] = $sinhvien;
    }
    //return $arr;
    Excel::create('Export Data',function($excel) use ($arrStudents){
      $excel->sheet('Sheet 1',function($sheet) use ($arrStudents){
        $sheet->fromArray($arrStudents);
      })->export('xlsx');
    });
  }
}
