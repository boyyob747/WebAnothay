<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Baitracnghiem;
use App\Cauhoi;
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
        'soluongcauhoi' => 'required|numeric'
    ));
      $baitrac = new Baitracnghiem();
      $baitrac->title = $request['title'];
      $baitrac->soluongcauhoi = $request['soluongcauhoi'];
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
      //lophoc_id
        $baitrac = Baitracnghiem::where('lophoc_id', $id)->get();
        if($baitrac->isEmpty())
        return back()->with('error_no_bai_tap','Chưa có bài tập của môn này');
        else {
          $data['lophocphan'] = 'class="active"';
          $cauhois = Cauhoi::where('id_baithi', $baitrac->first()->id)->get();
          return view('user.lambaitap',['baitrac' => $baitrac->first(),'cauhois' => $cauhois],$data);
        }

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
