@extends('layouts.main')
@section('title','Lớp học phần')
@section('content')
{!! Html::script('js/lambai.js') !!}
<div id="count_time"></div>
<div class="container-fluid col-md-8 col-md-offset-2">
  <ol class="breadcrumb">
  <li><a href="{{url('/getthongtinlopsv')}}">Lớp học phần</a></li>
  <li><a href="{{url('/home/getdsbaitap',session('lophoc_id'))}}">Dách sách bài tập</a></li>
  <li class="active">Làm bài tập</li>
  </ol>
  <div id="ketquadiv" hidden="true" class="panel panel-primary">
  <div class="panel-heading"><b>Kết quả</b></div>
  <div class="panel-body">
        <div id="ketqua"></div>
  </div>
  </div>
    <form id="form_baitap">
      {{ method_field('POST') }}
      <input type="hidden" id="_token" name="_token">
      <input type="hidden" id="isThi" name="isThi" value="0">
      <input type="hidden" id="id_baithi" name="id_baithi" value="{{$cauhois->first()->id_baithi}}" name="id_cauhoi">
      <?php $row = 0; ?>
      @foreach($cauhois as $cauhoi)
      <?php ++$row; ?>
      <div class="panel panel-primary">
      <div class="panel-heading"><b>Câu hỏi : {{$row}}</b><b style="float: right;">điểm :{{(1*10)/count($cauhois)}}</b></div>
      <div class="panel-body">
        <blockquote>
          <p>{!!$cauhoi->cau_hoi!!}</p>
        </blockquote>
      <div class="list-group">
    <div class="list-group-item">
        <label> <input type="radio" name="radio{{$cauhoi->id}}" id="radio1" value="0"/>a. {{$cauhoi->cautl_a}}</label>
    </div>
    <div class="list-group-item">
        <label> <input type="radio" name="radio{{$cauhoi->id}}" id="radio2" value="1"/>b. {{$cauhoi->cautl_b}}</label>
    </div>
    <div class="list-group-item">
        <label> <input type="radio" name="radio{{$cauhoi->id}}" id="radio3" value="2"/>c. {{$cauhoi->cautl_c}}</label>
    </div>
    <div class="list-group-item">
        <label> <input type="radio" name="radio{{$cauhoi->id}}" id="radio4" value="3"/>d. {{$cauhoi->cautl_d}}</label>
    </div>
      </div>
      <br>
        </div>
      </div>
      @endforeach
      <div class="text-center">
        <button type="button" data-link="{{ url('/home/getketqua') }}"  data-token="{{ csrf_token() }}" id="btn_submit_lambaitap" class="btn btn-info btn-block">Submit</button>
      </div>

    </form>
</div>
@stop
