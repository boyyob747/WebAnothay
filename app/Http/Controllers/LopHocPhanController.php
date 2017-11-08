<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lophocphan;
use App\Teacher;
use App\Monhoc;
use App\Thongtinlophocphan;
use App\User;
use Auth;
class LopHocPhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          if (Auth::user()->state == 1) {
                $id = Auth::user()->id;
                $teacher = Teacher::where('user_id', $id)->get();
                $lophocphans = Lophocphan::where('teacher_id', $teacher->first()->id)->get();
                $data['lophocphan'] = 'class="active"';
                $data['tengiaovien'] = Auth::user()->name;
                $data['teacher_id'] = $teacher->first()->id;
                $monhocs = Monhoc::all();
                $datathongtin = array();
                foreach ($lophocphans as $lophocphan) {
                 $thongtinlophocphans = Thongtinlophocphan::where('lophocphan_id', $lophocphan->id)->get();
                  if (!$thongtinlophocphans->isEmpty()) {
                    $datathongtin [] = $thongtinlophocphans;
                  }
               }
                return view('lophocphan.index',['lophocphans' => $lophocphans,'monhocs'=>$monhocs,'datathongtin' => $datathongtin],$data);
          }else if(Auth::user()->state == 3){
            $lophocphans = Lophocphan::all();
            $data['lophocphan'] = 'class="active"';
            $datathongtin = array();
            $monhocs = Monhoc::all();
            foreach ($lophocphans as $lophocphan) {
             $thongtinlophocphans = Thongtinlophocphan::where('lophocphan_id', $lophocphan->id)->get();
              if (!$thongtinlophocphans->isEmpty()) {
                $datathongtin [] = $thongtinlophocphans;
              }
           }
            return view('admin.quanly_lop',['lophocphans' => $lophocphans,'datathongtin' => $datathongtin,'monhocs'=>$monhocs],$data);
          }else{
            return abort(404);
          }
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
        'ten_lop_hoc_phan' => 'required|string|max:255',
        'name_teacher' => 'required|string|max:255',
    ));
      $teacherUser = User::where('name',$request['name_teacher'])->get();
      if($teacherUser->isEmpty()){
        return 'false';
      }else{
        $teacher = Teacher::where('user_id',$teacherUser->first()->id)->get()->first();
        $datathongtin = array();
        $lophocphan = new Lophocphan();
        $lophocphan->ten_lophocphans = $request['ten_lop_hoc_phan'];
        $lophocphan->teacher_id = $teacher->id;
        $lophocphan->monhoc_id = $request['monhoc_id'];
        $lophocphan->save();
        $lophocphans = Lophocphan::all();
        $data['lophocphan'] = 'class="active"';
        $datathongtin = array();
        $monhocs = Monhoc::all();
        foreach ($lophocphans as $lophoc) {
         $thongtinlophocphans = Thongtinlophocphan::where('lophocphan_id', $lophoc->id)->get();
          if (!$thongtinlophocphans->isEmpty()) {
            $datathongtin [] = $thongtinlophocphans;
          }
       }
        return view('admin.table_lophocphan',['lophocphans' => $lophocphans,'datathongtin' => $datathongtin,'monhocs'=>$monhocs],$data);
      }
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
        'ten_lop_hoc_phan' => 'required|string|max:255',
        'name_teacher' => 'required|string|max:255',
    ));
      $teacherUser = User::where('name',$request['name_teacher'])->get();
      if($teacherUser->isEmpty()){
        return 'false';
      }else{
        $teacher = Teacher::where('user_id',$teacherUser->first()->id)->get()->first();
        $lophocphan = Lophocphan::find($id);
        $lophocphan->ten_lophocphans = $request['ten_lop_hoc_phan'];
        $lophocphan->teacher_id = $teacher->id;
        $lophocphan->monhoc_id = $request['monhoc_id'];
        $lophocphan->save();
        $thongtinlophocphans = Thongtinlophocphan::where('lophocphan_id', $lophocphan->id)->get();
        $isHasThongtinSV = false;
        if (!$thongtinlophocphans->isEmpty()){
          $isHasThongtinSV = true;
        }
        $response = [
          'id' => $id,
          'ten_lophocphans' => $lophocphan->ten_lophocphans,
          'monhoc_id' => $lophocphan->monhoc->id,
          'monhoc' => $lophocphan->monhoc->monhoc,
          'name' => $lophocphan->teacher->user->name,
          'truong' => $lophocphan->teacher->truong,
          'khoa' => $lophocphan->teacher->khoa,
          'sodienthoai' => $lophocphan->teacher->sodienthoai,
          'url' => url('home/thongtinlophocphans'),
          'isHasThongtinSV' => $isHasThongtinSV
        ];
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
      $lophocphan = Lophocphan::find($id);
      $lophocphan->delete();
    }
}
