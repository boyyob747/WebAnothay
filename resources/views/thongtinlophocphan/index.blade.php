@extends('layouts.main')
@section('title','Dách sách sinh viên')
@section('content')
{!! Html::script('js/thongtinlophocphan.js') !!}
<ol class="breadcrumb">
<li><a href="{{url('/home/lophocphan')}}">Dách sách lớp học phần</a></li>
<li class="active">Dách sách sinh viên</li>
</ol>
<div class="panel panel-primary" >
<div class="panel-heading text-left panel-relative">
  <h2>Dánh sách sinhvien của lớp : {{$ten_lophocphans}}</h2>
  <a href="{{url('/home/baitracnghiem',$thongtinlophocphans->first()->lophocphan_id)}}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i> Dách sách bài trắc nghiệm
  </a>
  <a href="{{url('/home/setstate/0/'.$thongtinlophocphans->first()->lophocphan_id)}}" style="float: right;" class="btn btn-danger" >Click để không cho phép tất cả sinh viên vào phòng thi</a>

  <a href="{{url('/home/setstate/1/'.$thongtinlophocphans->first()->lophocphan_id)}}" style="float: right;" class="btn btn-info" >Click để cho phép tất cả sinh viên vào phòng thi</a>
</div>
<div id="table_thongtin"
@include('thongtinlophocphan.table_thongtin')
</div>
</div>
@stop
