<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Teacher;
use App\User;
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
        $teachers = DB::table('teachers')->Paginate(10);
        foreach ($teachers as $teacher)
        {
            $users[] =  User::find($teacher->user_id);
        }
        return view('teachers.teacher', ['teachers' => $teachers,'users' => $users],$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data['giaovien'] = 'class="active"';
        return view('teachers.add_teacher',$data);
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
        $teachers = Teacher::orderBy('id', 'desc')->take(10)->get();
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
        $teach = Teacher::find($id);

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
      // $teacher = new Teacher();
      // $teacher-> = $request['ngaysinh'];
      // $teacher-> = $request['truong'];
      // $teacher-> = $request['khoa'];
      // $teacher-> = $request['sodienthoai'];
      // $teacher->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $teacher = Teacher::find($id);
          $teacher->delete();
    }
}
