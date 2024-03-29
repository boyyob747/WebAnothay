@extends('layouts.main')
@section('title','Dách sách bài tập')
@section('content')
<div class="container-fluid col-md-10 col-md-offset-1">
  <ol class="breadcrumb">
  <li><a href="{{url('/getthongtinlopsv')}}">Lớp học phần</a></li>
  <li class="active">Danh sách bài tập</li>
  </ol>
  <div class="panel panel-primary">
  <div class="panel-heading">Danh sách bài tập của môn : {{$baitracs->first()->lophocphan->ten_lophocphans}}</div>
  <div class="panel-body">
    @if ($message = Session::get('error_no_bai_tap'))
    <div class="alert alert-danger alert-dismissable fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <b><?=$message?></b>
    </div>
    @endif
    <div class="table-responsive">
      <table class="table table table-hover" id="table_teachers">
        <thead>
          <tr>
            <th>#</th>
            <th>Tên bài tập</th>
            <th>Luyện tập</th>
          </tr>
        </thead>
        <tbody id="tb_body_sv">
          <?php $row = 0;
          ?>
          @foreach($baitracs as $baitrac)
          <?php $row = $row + 1; ?>
          <tr class="item">
            <th scope="row"> {{$row}}</th>
            <td>{{$baitrac->title}}</td>
            <td><a href="{{url('/home/lambai',$baitrac->id)}}" class="btn btn-danger">Bấm vào để làm bài</a></td>
          @endforeach
            </tbody>
          </table>
        </div>
  </div>
</div>

</div>
@stop
