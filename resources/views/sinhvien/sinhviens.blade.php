@extends('layouts.main')
@section('title','Sinh viên')
@section('content')

    {!! Html::script('js/sinhvien.js') !!}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css"
          rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
       @include('sinhvien.table_sinhvien')
      <div id="include"></div>

@stop
