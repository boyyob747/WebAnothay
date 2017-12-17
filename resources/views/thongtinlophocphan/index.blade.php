@extends('layouts.main')
@section('title','Dách sách sinh viên')
@section('content')
{!! Html::script('js/thongtinlophocphan.js') !!}
<ol class="breadcrumb">
<li><a href="{{url('/home/lophocphan')}}">Danh sách lớp học phần</a></li>
<li class="active">Danh sách sinh viên</li>
</ol>
<div class="panel panel-primary" >
<div class="panel-heading text-left panel-relative">
  <h2>Danh sách sinhvien của lớp : {{$ten_lophocphans}}</h2>
  <a href="{{url('/home/baitracnghiem',$thongtinlophocphans->first()->lophocphan_id)}}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i> Danh sách bài trắc nghiệm
  </a>
  <a href="{{url('/exportdiemsinhviens',$thongtinlophocphans->first()->lophocphan_id)}}" class="btn btn-default"><i class="fa fa-print" aria-hidden="true"></i> Print
  </a>
  <a href="{{url('/home/setstate/0/'.$thongtinlophocphans->first()->lophocphan_id)}}" style="float: right;" class="btn btn-danger" >Không cho phép tất cả sinh viên vào phòng thi</a>

  <a href="{{url('/home/setstate/1/'.$thongtinlophocphans->first()->lophocphan_id)}}" style="float: right;" class="btn btn-info" >Cho phép tất cả sinh viên vào phòng thi</a>
</div>
<div id="table_thongtin"
@include('thongtinlophocphan.table_thongtin')
</div>
</div>
@stop
