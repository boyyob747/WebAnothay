<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Teacher;
use App\User;
use Auth;
use App\Http\Requests\TeacherRequest;
use PhpParser\Node\Expr\Array_;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = array();
        $data['giaovien'] = 'class="active"';
        $teachers = Teacher::all();
        return view('teachers.teacher', ['teachers' => $teachers],$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // $data['giaovien'] = 'class="active"';
      // return view('teachers.add_teacher',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request)
    {

        $teacher = new Teacher();
        $teacher->ngaysinh = $request['ngaysinh'];
        $teacher->sodienthoai = $request['sodienthoai'];
        $teacher->truong = $request['truong'];
        $teacher->khoa = $request['khoa'];
        $user = User::create([
            'name' => $request['name'],
            'state' => '1',
            'username' => $request['username'],
            'email' =>  $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        $teacher->user_id = $user->id;
        $teacher->save();
        return redirect('home/teacher');
    }
    public function show($id)
    {
       // $teachers = Teacher::all()->take(2)->get();
        $teachers = Teacher::orderBy('id', 'desc')->take(7)->get();
        $data['giaovien'] = 'class="active"';
        return view('teachers.teacher', compact('teachers'),$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $teacherforedit = Teacher::find($id);
      return view('teachers.modal_edit_teacher',['teacherforedit' => $teacherforedit,'submitButtonText' => 'Save']);
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
      if($request['password'] != '')
      {
        $this->validate($request, array (
          'name' => 'required|string|max:255',
          'ngaysinh' => 'date_format:"Y-m-d"|required',
          'sodienthoai' => 'required|numeric',
          'truong' => 'required',
          'khoa' => 'required',
          'password' => 'required|string|min:6|'
      ));
      }
      else {
        $this->validate($request, array (
          'name' => 'required|string|max:255',
          'ngaysinh' => 'date_format:"Y-m-d"|required',
          'sodienthoai' => 'required|numeric',
          'truong' => 'required',
          'khoa' => 'required'
      ));
      }

        $msgError = "";
        $teacherforedit = Teacher::find($id);
        $userforeidt = User::find($request['user_id']);
        $teacherforedit->ngaysinh = $request['ngaysinh'];
        $teacherforedit->sodienthoai = $request['sodienthoai'];
        $teacherforedit->truong = $request['truong'];
        $teacherforedit->khoa = $request['khoa'];
        $userforeidt->name = $request['name'];
        if($request['password'] != '')
        {
            $userforeidt->password = bcrypt($request['password']);
        }
        $response[] = [
          'name' => $userforeidt->name,
          'username' => $userforeidt->username,
          'email' => $userforeidt->email,
          'ngaysinh' => $teacherforedit->ngaysinh,
          'truong' => $teacherforedit->truong,
          'khoa' => $teacherforedit->khoa,
          'sodienthoai' => $teacherforedit->sodienthoai,
          'id' => $teacherforedit->id,
          'user_id' => $userforeidt->id
        ];
        if ( $teacherforedit->save() &&  $userforeidt->save())
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
    public function deleteTeacher($id)
    {
          $user = User::find($id);
          if ( $user->delete())
          {
            return 'Succes';
          }
    }
    public function deleteAll($state)
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
