@extends('layouts.main')
@section('title','Dách sách sinh viên')
@section('content')
  {!! Html::script('js/thongtinlophocphan.js') !!}
@include('thongtinlophocphan.table_thongtin')
@stop
