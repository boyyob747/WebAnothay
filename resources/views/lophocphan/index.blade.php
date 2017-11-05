@extends('layouts.main')
@section('title','Lớp học phần')
@section('content')
{!! Html::script('js/lophocphan.js') !!}
@include('lophocphan.table_lophocphan')
@stop
