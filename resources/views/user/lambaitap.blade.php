@extends('layouts.main')
@section('title','Lớp học phần')
@section('content')
{!! Html::script('js/lambai.js') !!}
<div id="count_time"></div>
<div class="container-fluid col-md-8 col-md-offset-2">
    <form>
      <?php $row = 0; ?>
      @foreach($cauhois as $cauhoi)
      <?php ++$row; ?>
      <div class="panel panel-primary">
      <div class="panel-heading"><b>Câu hỏi : {{$row}}</b></div>
      <div class="panel-body">
        <blockquote>
          <p>{{$cauhoi->cau_hoi}}</p>
        </blockquote>
      <div class="list-group">
    <div class="list-group-item">
        <input type="radio" name="radio{{$row}}" id="radio1" value="0"/>
        <label for="radio1">{{$cauhoi->cautl_a}}</label>
    </div>
    <div class="list-group-item">
        <input type="radio" name="radio{{$row}}" id="radio2" value="1"/>
        <label for="radio2">{{$cauhoi->cautl_b}}</label>
    </div>
    <div class="list-group-item">
        <input type="radio" name="radio{{$row}}" id="radio3" value="2"/>
        <label for="radio3">{{$cauhoi->cautl_c}}</label>
    </div>
    <div class="list-group-item">
        <input type="radio" name="radio{{$row}}" id="radio4" value="3"/>
        <label for="radio4">{{$cauhoi->cautl_d}}</label>
    </div>
      </div>
      <br>
        </div>
      </div>
      @endforeach
    </form>
</div>
@stop
