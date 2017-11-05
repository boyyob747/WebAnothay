@extends('layouts.main')
@section('title','Dách bài trắc nghiệm')
@section('content')
{!! Html::script('js/baitracnghiem.js') !!}
@include('baitracnghiem.table_baitrac')
@stop
