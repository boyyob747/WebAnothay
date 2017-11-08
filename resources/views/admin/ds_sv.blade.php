@extends('layouts.main')
@section('title','Dánh sách sinh viên')
@section('content')
<ol class="breadcrumb">
<li><a href="{{url('/home/lophocphan')}}">Dánh sách lớp học phần</a></li>
<li class="active">Dách sách sinh viên</li>
</ol>
<div class="panel panel-primary" >
<div class="panel-heading text-left panel-relative">
  <h2>Dánh sách sinhvien của lớp : {{$ten_lophocphans}}</h2>
</div>
<div id="table_thongtin"
@include('admin.table_ds_sv')
</div>
</div>
@stop
