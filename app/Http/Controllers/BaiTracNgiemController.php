<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Baitracnghiem;
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
