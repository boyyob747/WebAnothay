@extends('layouts.main')
@section('title','Dánh sách sinh viên')
@section('content')
<ol class="breadcrumb">
<li><a href="{{url('/home/lophocphan')}}">Danh sách lớp học phần</a></li>
<li class="active">Danh sách sinh viên</li>
</ol>
<div class="panel panel-primary" >
<div class="panel-heading text-left panel-relative">
  <h2>Danh sách sinhvien của lớp : {{$ten_lophocphans}}</h2>
  <a href="{{url('/exportdiemsinhviens',$thongtinlophocphans->first()->lophocphan_id)}}" class="btn btn-default"><i class="fa fa-print" aria-hidden="true"></i> Print
  </a>
</div>
<div id="table_thongtin"
@include('admin.table_ds_sv')
</div>
</div>
@stop
