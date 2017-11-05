@extends('layouts.main')
@section('title','Lớp học phần')
@section('content')
<div class="container-fluid col-md-8 col-md-offset-2">
  <div class="panel panel-primary">
  <div class="panel-heading">Dách sách lớp học phần của : {{Auth::user()->name}}</div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table table-hover" id="table_teachers">
        <thead>
          <tr>
            <th>#</th>
            <th>Tên lớp</th>
            <th>Giảng viên</th>
            <th>Nhóm thi</th>
            <th>Điểm</th>
            <th>Luyền tập</th>
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
            <td>{{$thongtinlophocphan->lophocphan->teacher->user->name}}</td>
            <td>{{$thongtinlophocphan->nhom_thi}}</td>
            <td>chưa có điểm</td>
            <td><a href="{{url('/home/lambaitap',$thongtinlophocphan->lophocphan->id)}}" class="btn btn-danger">Click đây để làm bài tập</a></td>
            @if($thongtinlophocphan->state == 0)
            <td>không phải giờ thi</td>
            @else
            <td><a href="#" class="btn btn-danger">Click đây để làm thi</a></td>
            @endif
          @endforeach
            </tbody>
          </table>
        </div>
  </div>
</div>

</div>
@stop