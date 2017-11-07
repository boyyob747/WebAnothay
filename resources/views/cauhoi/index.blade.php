@extends('layouts.main')
@section('title','Bài')
@section('content')
{!! Html::script('js/cauhoi.js') !!}

<div id="form_cauhoi">
@include('cauhoi.form_cauhoi')
</div>
@stop
