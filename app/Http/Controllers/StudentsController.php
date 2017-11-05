<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\User;
use Auth;
class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = array();
      $data['sinhvien'] = 'class="active"';
      $students = Student::all();
      return view('sinhvien.sinhviens', ['students' => $students],$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, array (
        'name' => 'required|string|max:255',
        'ngaysinh' => 'date_format:"Y-m-d"|required',
        'sodienthoai' => 'required|numeric',
        'lop' => 'required',
        'username' => 'required|numeric|unique:users',
        'email' => 'required|string|email|max:255|unique:users',
        'khoa' => 'required'
    ));
      $student = new Student();
      $student->ngaysinh = $request['ngaysinh'];
      $student->mssv = $request['username'];
      $student->sodienthoai = $request['sodienthoai'];
      $student->lop = $request['lop'];
      $student->khoa = $request['khoa'];
      $user = User::create([
          'name' => $request['name'],
          'state' => 0,
          'username' => $request['username'],
          'email' =>  $request['email'],
          'password' => bcrypt($request['ngaysinh']),
      ]);
      $student->user_id = $user->id;
      $student->save();
      $students = Student::all();
      return view('sinhvien.table_sinhvien', ['students' => $students]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, array (
        'name' => 'required|string|max:255',
        'ngaysinh' => 'date_format:"Y-m-d"|required',
        'sodienthoai' => 'required|numeric',
        'lop' => 'required',
        'khoa' => 'required'
      ));
        $student = Student::find($id);
        $user = User::find($request['user_id']);
        $student->ngaysinh = $request['ngaysinh'];
        $user->password= bcrypt($request['ngaysinh']);
        $student->sodienthoai = $request['sodienthoai'];
        $student->lop = $request['lop'];
        $student->khoa = $request['khoa'];
        $user->name = $request['name'];
        $response[] = [
          'name' => $user->name,
          'username' => $user->username,
          'email' => $user->email,
          'ngaysinh' => $student->ngaysinh,
          'lop' => $student->lop,
          'khoa' => $student->khoa,
          'sodienthoai' => $student->sodienthoai,
          'mssv' => $student->mssv,
          'id' => $student->id,
          'user_id' => $user->id
        ];
        if ( $student->save() &&  $user->save())
        {
          return response ()->json ( $response);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::find($id);
      if ( $user->delete())
      {
        return 'Succes';
      }
    }
    public function deleteAll()
    {
          $currentState = Auth::user()->state;
          if ($currentState != 3)
          {
            return abort(404);
          }
          else
          {
            $users = User::all();
            foreach ($users as $user) {
              if ($user->state == $state)
              {
                $user->delete();
              }
            }
            return back()->with('success','Đã xáo tất cả thánh công');
          }
    }
}
