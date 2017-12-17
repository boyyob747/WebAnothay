<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Thongtinlophocphan;
use Auth;
use App\Student;
use App\Teacher;
use App\Lophocphan;
class ThongTinLopHocPhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->state == 3){

        }else {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $thongtinlophocphans = Thongtinlophocphan::where('lophocphan_id', $id)->get();
      session(['lophoc_id' => $id ] );
      $data['lophocphan'] = 'class="active"';
      $data['ten_lophocphans'] = $thongtinlophocphans->first()->lophocphan->ten_lophocphans;
        if(Auth::user()->state == 1){

          return view('thongtinlophocphan.index',['thongtinlophocphans' => $thongtinlophocphans],$data);
        }else if (Auth::user()->state == 3){
          return view('admin.ds_sv',['thongtinlophocphans' => $thongtinlophocphans],$data);
        }else{
          return abort(404);
        }


    }

    public function getThongTinLopSV()
    {
      if (Auth::check()) {
            $id = Auth::user()->id;
            $student = Student::where('user_id', $id)->get()->first();
            $thongtinlophocphans = Thongtinlophocphan::where('student_id', $student->id)->get();
            $data['lophocphan'] = 'class="active"';
            $data['ten_lophocphans'] = $thongtinlophocphans->first()->lophocphan->ten_lophocphans;
            return view('user.list_lop',['thongtinlophocphans' => $thongtinlophocphans],$data);
          }
        return abort(404);

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
        'diem' => 'numeric|max:10'
    ));
        $thongtin = Thongtinlophocphan::find($id);
        $thongtin->diem = $request['diem'];
        $thongtin->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function setStateTest(Request $request)
    {
      $id_thongtin = $request['id_thongtin'];
      $state = $request['state'];
      $thongtin = Thongtinlophocphan::find($id_thongtin);
      $thongtin->state = $state;
      $thongtin->save();
      $response[] = [
        'name' => $thongtin->student->user->name,
        'state' => $thongtin->state,
        'mssv' => $thongtin->student->mssv,
        'sodienthoai' => $thongtin->student->sodienthoai,
        'lop' => $thongtin->student->lop,
        'nhom_thi' => $thongtin->nhom_thi,
        'diem' => $thongtin->diem,
        'STT' => $thongtin->STT,
        'id' => $thongtin->id,
        'url' => url('/home/setStateTest'),
        'token' => $request['_token']
      ];
      return response ()->json ( $response);
    }
    public function setStateTestAll($state,$lophocphan_id)
    {
       if(Auth::user()->state == 1)
       {
         $lophocphan = Lophocphan::find($lophocphan_id);
         $thongtinlophocphans = Thongtinlophocphan::where('lophocphan_id', $lophocphan->id)->get();
         foreach ($thongtinlophocphans as $thongtinlophocphan) {
           $thongtinlophocphan->state = $state;
           $thongtinlophocphan->save();
         }
         return back();
       }
       else {
         return abort(404);
       }
    }
}
