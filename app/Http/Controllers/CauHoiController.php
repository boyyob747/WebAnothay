<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cauhoi;
use App\Baitracnghiem;
use Hash;
class CauHoiController extends Controller
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
        'cau_hoi' => 'required|string',
        'cau_tla' => 'required|string',
        'cau_tlb' => 'required|string',
        'cau_tlc' => 'required|string',
        'cau_tld' => 'required|string',
        'cau_tl' => 'required'
    ));
      $cauhoi = new Cauhoi();
      $cauhoi->cautl_a = $request['cau_tla'];
      $cauhoi->cautl_b = $request['cau_tlb'];
      $cauhoi->cautl_c = $request['cau_tlc'];
      $cauhoi->cautl_d = $request['cau_tld'];
      $cauhoi->cau_hoi = $request['cau_hoi'];
      $cauhoi->cau_tl = bcrypt($request['cau_tl']);
      $cauhoi->id_baithi = $request['id_baithi'];
      $cauhoi->save();

      $baitracs = Baitracnghiem::where('id', $request['id_baithi'])->get();
      $data['lophocphan'] = 'class="active"';
      $data['baitrac'] = $baitracs->first();
      $cauhois = Cauhoi::where('id_baithi', $request['id_baithi'])->get();
      return view('cauhoi.form_cauhoi',['cauhois' => $cauhois],$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $baitracs = Baitracnghiem::where('id', $id)->get();
      session(['id_baithi' => $id]);
      $data['lophocphan'] = 'class="active"';
      $data['baitrac'] = $baitracs->first();
      $cauhois = Cauhoi::where('id_baithi', $id)->get();
      return view('cauhoi.index',['cauhois' => $cauhois],$data);
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
