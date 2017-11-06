<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Baitracnghiem;
use App\Thongtinlophocphan;
use App\Cauhoi;
use App\Student;
use Auth;
class BaiTracNgiemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        'title' => 'required|string|max:191',
        'thoigianthi' => 'required|numeric'
    ));
      $duration = $request['thoigianthi'];
      $baitrac = new Baitracnghiem();
      $baitrac->duration = $duration;
      $baitrac->title = $request['title'];
      $baitrac->diemcua = $request['diemcua'];//lophoc_id
      $baitrac->lophoc_id = $request['lophocphan_id'];
      $baitrac->save();
      $baitracs = Baitracnghiem::where('lophoc_id', $request['lophocphan_id'])->get();
      $data['lophocphan'] = 'class="active"';
      $data['lophocphan_id'] = $request['lophocphan_id'];
      return view('baitracnghiem.table_baitrac',['baitracs' => $baitracs],$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $baitracs = Baitracnghiem::where('lophoc_id', $id)->get();
      $data['lophocphan'] = 'class="active"';
      $data['lophocphan_id'] = $id;
      return view('baitracnghiem.index',['baitracs' => $baitracs],$data);
    }
    public function getBaiTap($id)
    {
        $baitracs = Baitracnghiem::where('lophoc_id', $id)->where('diemcua', 0)->get();
        if($baitracs->isEmpty())
        return back()->with('error_no_bai_tap','Chưa có bài tập của môn này');
        else {
          $data['lophocphan'] = 'class="active"';
          return view('user.danhsach_baitap',['baitracs' => $baitracs],$data);
        }

    }
    public function lamBaitap($id) //id = $baitrac->id
    {
        $cauhois =  Cauhoi::where('id_baithi', $id)->get();
        $baitrac = Baitracnghiem::where('id', $id)->where('diemcua', 0)->get()->first();
        $duration = $baitrac->duration;
        $student = Student::where('user_id', Auth::user()->id)->get()->first();
        $thongtinlophocphan = Thongtinlophocphan::where('student_id', $student->id)->get()->first();
        //for thi just test
        session(['id_thongtin' => $thongtinlophocphan->id ] );
        // if($thongtinlophocphan->end_time == null)
        // {
          date_default_timezone_set('Asia/Bangkok');
          $timenow = date("Y-m-d H:i:s");
          $endtime = date("Y-m-d H:i:s",strtotime('+'.$duration.'minutes',strtotime($timenow)));
          session(['end_time' => $endtime ] );
        //   $thongtinlophocphan->end_time = $endtime;
        //   $thongtinlophocphan->save();
        // }
        // else {
        //   session(['end_time' => $thongtinlophocphan->end_time] );
        // }
        if($cauhois->isEmpty())
        return back()->with('error_no_bai_tap','Chưa có câu hỏi của bài này');
        else {
          $data['lophocphan'] = 'class="active"';
          $data['baitrac'] = $baitrac;
          return view('user.lambaitap',['cauhois' => $cauhois],$data);
        }
    }
    public function doCountTime()
    {
      date_default_timezone_set('Asia/Bangkok');
      $from_time1 = date("Y-m-d H:i:s");
      $to_time1 = session('end_time');
      $timefirst = strtotime($from_time1);
	     $timesecond =strtotime($to_time1);
	      $diffsec =$timesecond-$timefirst;
	       $msg = "";
	        if ($diffsec  <= 0)
          {
            $id_thongtin = session('id_thongtin');
            $thongtinlophocphan = Thongtinlophocphan::find($id_thongtin);
            $thongtinlophocphan->end_time = null;
            $thongtinlophocphan->save();
            echo 'stop';
          }
	        else
		      echo gmdate("H:i:s",$diffsec);
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
