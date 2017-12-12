<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Baitracnghiem;
use App\Thongtinlophocphan;
use App\Cauhoi;
use App\Student;
use Auth;
use Hash;
use App\Teacher;
use App\Lophocphan;
class BaiTracNgiemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return abort(404);
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
      $user_id = Auth::user()->id;
      $id_teacher = Teacher::where('user_id', $user_id)->get()->first()->id;
      $lophocs = Lophocphan::where('teacher_id', $id_teacher)->get();
      $baitracsCuaTeacherArray = array();
      foreach ($lophocs as $lophoc) {
        $baitracCuaTeachers = Baitracnghiem::where('lophoc_id', $lophoc->id)->get();
        if(!$baitracCuaTeachers->isEmpty()){
          foreach ($baitracCuaTeachers as $baitracCuaTeacher) {
            $baitracsCuaTeacherArray [] = $baitracCuaTeacher ;
          }
        }
      }
      $data['lophocphan'] = 'class="active"';
      $data['lophocphan_id'] = $id;
      $data['baitracsCuaTeacherArray'] = $baitracsCuaTeacherArray;
      return view('baitracnghiem.index',['baitracs' => $baitracs],$data);
    }
    public function getBaiTap($id)
    {
        $baitracs = Baitracnghiem::where('lophoc_id', $id)->where('diemcua', 0)->get();
        session(['lophoc_id' => $id ] );
        if($baitracs->isEmpty())
        return back()->with('error_no_bai_tap','Chưa có bài tập của môn này');
        else {
          $data['lophocphan'] = 'class="active"';
          return view('user.danhsach_baitap',['baitracs' => $baitracs],$data);
        }

    }
    public function lamBaiThi($id)//id = $thongtinlophocphan->lophocphan->id
    {
      $baitracs = Baitracnghiem::where('lophoc_id', $id)->where('diemcua', 1)->get();
      session(['lophoc_id' => $id ] );
      if($baitracs->isEmpty())
      return back()->with('error_no_bai_tap','Chưa có bài thi của môn này');
      else {
        $baitrac = $baitracs->last();
        $cauhois =  Cauhoi::inRandomOrder()->where('id_baithi', $baitracs->last()->id)->get();
        $duration = $baitrac->duration;
        $student = Student::where('user_id', Auth::user()->id)->get()->first();
        $thongtinlophocphan = Thongtinlophocphan::where('student_id', $student->id)->where('lophocphan_id',$id)->get()->first();
        if($thongtinlophocphan->state == 0)
        return abort(404);
        session(['id_thongtin' => $thongtinlophocphan->id ] );
        if($thongtinlophocphan->end_time == null)
        {
          date_default_timezone_set('Asia/Bangkok');
          $timenow = date("Y-m-d H:i:s");
          $endtime = date("Y-m-d H:i:s",strtotime('+'.$duration.'minutes',strtotime($timenow)));
          session(['end_time' => $endtime ] );
          $thongtinlophocphan->end_time = $endtime;
          $thongtinlophocphan->save();
        }
        else {
          session(['end_time' => $thongtinlophocphan->end_time] );
        }
        if($cauhois->isEmpty())
        return back()->with('error_no_bai_tap','Chưa có câu hỏi của bài này');
        else {
          $data['lophocphan'] = 'class="active"';
          $data['baitrac'] = $baitrac;
          return view('user.lambaithi',['cauhois' => $cauhois],$data);
        }
      }
    }
    public function lamBaitap($id) //id = $baitrac->id
    {
        $cauhois =  Cauhoi::inRandomOrder()->where('id_baithi', $id)->get();
        $baitrac = Baitracnghiem::where('id', $id)->where('diemcua', 0)->get()->first();
        $duration = $baitrac->duration;
        $student = Student::where('user_id', Auth::user()->id)->get()->first();
        $thongtinlophocphan = Thongtinlophocphan::where('student_id', $student->id)->where('lophocphan_id',$cauhois->first()->baitracnghiem->lophocphan->id)->get()->first();
        session(['id_thongtin' => $thongtinlophocphan->id ] );
          date_default_timezone_set('Asia/Bangkok');
          $timenow = date("Y-m-d H:i:s");
          $endtime = date("Y-m-d H:i:s",strtotime('+'.$duration.'minutes',strtotime($timenow)));
          session(['end_time' => $endtime ] );
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
            echo 'stop';
          }
	        else
		      echo gmdate("H:i:s",$diffsec);
    }
    public function getKetQua(Request $request)
    {
      $name = Auth::user()->name;
      $id_baithi = $request->input('id_baithi');
      $cauhois =  Cauhoi::inRandomOrder()->where('id_baithi', $id_baithi)->get();
      $diem = 0;
      $count_cauhoi = count($cauhois);
      foreach ($cauhois as $cauhoi ) {
        $cautl = $request->input('radio'.$cauhoi->id);
        if(Hash::check($cautl, $cauhoi->cau_tl)){
          $diem = $diem + 1;
        }
      }
      if($request->input('isThi') == 1){
          $id = Auth::user()->id;
          $student = Student::where('user_id', $id)->get()->first();
          $thongtinlophocphan = Thongtinlophocphan::where('student_id', $student->id)->where('lophocphan_id',$cauhois->first()->baitracnghiem->lophocphan->id)->get()->first();
          $thongtinlophocphan->diem = ($diem*10)/$count_cauhoi;
          $thongtinlophocphan->state = 0;
          $thongtinlophocphan->end_time = null;
          $thongtinlophocphan->save();
      }
      echo $title = "<p><b>Kết quả ".$cauhois->first()->baitracnghiem->duration." phút ,".$cauhois->first()->baitracnghiem->title."</b></p>";
      echo "<p>Tên : ".$name."</p>";
      echo "<p>Kết quả : ".$diem."/".$count_cauhoi."</p>";
      echo "<p>Điểm : ".sprintf("%.2f", ($diem*10)/$count_cauhoi)."</p>";
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
