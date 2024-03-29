@extends('layouts.main')
@section('title','Lớp học phần')
@section('content')
<div class="container-fluid col-md-10 col-md-offset-1">
  <div class="panel panel-primary">
  <div class="panel-heading">Danh sách lớp học phần của : {{Auth::user()->name}}</div>
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
            <th>Tên lớp</th>
            <th>Môn</th>
            <th>Giảng viên</th>
            <th>Nhóm thi</th>
            <th>Điểm</th>
            <th>Luyện tập</th>
            <th>Làm bài thi</th>
          </tr>
        </thead>
        <tbody id="tb_body_sv">
          <?php $row = 0;
          ?>
          @foreach($thongtinlophocphans as $thongtinlophocphan)
          <?php $row = $row + 1; ?>
          <tr class="item">
            <th scope="row"> {{$row}}</th>
            <td>{{$thongtinlophocphan->lophocphan->ten_lophocphans}}</td>
            <td>{{$thongtinlophocphan->lophocphan->monhoc->monhoc}}</td>
            <td>{{$thongtinlophocphan->lophocphan->teacher->user->name}}</td>
            <td>{{$thongtinlophocphan->nhom_thi}}</td>
            @if($thongtinlophocphan->diem < 0)
            <td>chưa có điểm</td>
            @else
            <td>{{$thongtinlophocphan->diem}}</td>
            @endif
            <td><a href="{{url('/home/getdsbaitap',$thongtinlophocphan->lophocphan->id)}}" class="btn btn-primary">Click đây để xem bài tập</a></td>
            @if($thongtinlophocphan->state == 0)
            <td>không phải giờ thi</td>
            @else
            <td><a href="{{url('/home/lambaithi',$thongtinlophocphan->lophocphan->id)}}" onclick="return popitup(this);" class="btn btn-danger">Click đây để làm thi</a></td>
            @endif
          @endforeach
            </tbody>
          </table>
        </div>
  </div>
</div>

</div>
@stop
