@extends('layouts.main')
@section('title','Bài')
@section('content')
{!! Html::script('js/cauhoi.js') !!}
@include('cauhoi.add_cauhoi')
@stop
