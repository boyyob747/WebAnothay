<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cauhoi;
use App\Baitracnghiem;
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
      $baitracs = Baitracnghiem::where('id', $id)->get();
      $data['lophocphan'] = 'class="active"';
      $data['baitrac'] = $baitracs->first();
      $cauhois = Cauhoi::where('id_baithi', $id)->get();
      if ($cauhois->isEmpty()) {
        for($i=0;$i<$baitracs->first()->soluongcauhoi;$i++)
        {
          $cauhoi = new Cauhoi();
          $cauhoi->id_baithi = $id;
          $cauhoi->save();
        }
        $cauhoiss = Cauhoi::where('id_baithi', $id)->get();
        return view('cauhoi.index',['cauhois' => $cauhoiss],$data);
      }
      else {
        return view('cauhoi.index',['cauhois' => $cauhois],$data);
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
