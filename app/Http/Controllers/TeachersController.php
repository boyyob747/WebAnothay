<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Teacher;
class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::get();
        $data['giaovien'] = 'class="active"';
        return view('teachers.teacher', compact('teachers'),$data);
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
    public function store(Request $request)
    {
      //return $input = $request->all();
        // $teacher = new Teacher();
        // $teacher-> = $request['ngaysinh'];
        // $teacher-> = $request['truong'];
        // $teacher-> = $request['khoa'];
        // $teacher-> = $request['sodienthoai'];
        // $teacher->save();
        echo 'fucker';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::find($id);
        if(empty($teacher))
          abort(404);
        return $teacher;
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
