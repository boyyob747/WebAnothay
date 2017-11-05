<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lophocphan;
use App\Teacher;
use App\Monhoc;
use App\Thongtinlophocphan;
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
          if (Auth::check()) {
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
    ));
      $datathongtin = array();
      $lophocphan = new Lophocphan();
      $lophocphan->ten_lophocphans = $request['ten_lop_hoc_phan'];
      $lophocphan->teacher_id = $request['teacher_id'];
      $lophocphan->monhoc_id = $request['monhoc_id'];
      $lophocphan->save();
      $lophocphans = Lophocphan::where('teacher_id', $request['teacher_id'])->get();
      $data['lophocphan'] = 'class="active"';
      $data['tengiaovien'] = Auth::user()->name;
      $monhocs = Monhoc::all();
      $data['teacher_id'] = $request['teacher_id'];
      foreach ($lophocphans as $lophocphan) {
        $thongtinlophocphans = Thongtinlophocphan::where('lophocphan_id', $lophocphan->id)->get();
         if (!$thongtinlophocphans->isEmpty()) {
           $datathongtin [] = $thongtinlophocphans;
         }
      }
        return view('lophocphan.table_lophocphan',['lophocphans' => $lophocphans,'monhocs'=>$monhocs,'datathongtin' => $datathongtin],$data);
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
        //
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
}
